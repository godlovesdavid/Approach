<?php

/*************************************************************************

 APPROACH 
 Organic, human driven software.


 COPYRIGHT NOTICE
 __________________

 (C) Copyright 2012 - Approach Foundation LLC, Garet Claborn
 All Rights Reserved.

 Notice: All information contained herein is, and remains
 the property of Approach Foundation LLC and the original author, Garet Claborn,
 herein referred to as "original author".

 The intellectual and technical concepts contained herein are
 proprietary to Approach Foundation LLC and the original author
 and may be covered by U.S. and Foreign Patents, patents in process,
 and are protected by trade secret or copyright law.

/*************************************************************************
*
*
* Approach by Garet Claborn is licensed under a
* Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
*
* Based on a work at https://github.com/stealthpaladin .
*
* Permissions beyond the scope of this license may be available at
* http://www.approachfoundation.org/now.
*
*
*
*************************************************************************/

global $ApproachServiceCall;
global $RuntimePath;
global $InstallPath;
global $UserPath;
global $StaticFiles;
global $DeployPath;

function ServiceException($mode, $ThrowingService, $key){ if($mode == 'require') return $key .' is a required value for ' . $ThrowingService . ' to run properly.';  }

if(!isset($ApproachServiceCall)) $ApproachServiceCall = true;   //still needed?
if(!isset($RuntimePath)) $RuntimePath = __DIR__.'/../..'; //if no runtime path, escape from the approach directory

require_once(__DIR__ .'/../base/Render.php');
require_once(__DIR__ .'/../base/Utility.php');

class Service
{
	public	$Response='';
	public	$Directive='';
	public	$Issues=array();

	protected	$Message=array();
	protected	$Activity=array();
	protected	$LiveComponent=0;
	private		$authorized=true; //override to false in child class for required authorization (i,e.. private-use-only APIs)

	public function Service()
	{
	  $this->FilterRequest();
	  $this->Authorize($this->Message['authorization']);

	  if($this->authorized) $this->LinkComposition();
	  else                  Blame($this->Issues);   //Force Script to Output and Quit
	}
	
	protected function FilterRequest()
	{
	  $this->Message['authorization']=array();
	  $this->Message['context']=array();
	  $this->SecureAccess();

	  if(isset($_REQUEST['user']))        $this->Message['authorization']['Username']     =$_REQUEST['user'];
	  if(isset($_REQUEST['pass']))        $this->Message['authorization']['Password']     =$_REQUEST['pass'];
	  if(isset($_REQUEST['sitekey']))     $this->Message['authorization']['SiteKey']      =$_REQUEST['sitekey'];
	  if(isset($_REQUEST['license']))     $this->Message['authorization']['LicenseKey']   =$_REQUEST['license'];
	  if(isset($_REQUEST['ssl']))         $this->Message['authorization']['SSLKey']       =$_REQUEST['ssl'];

	  if(isset($_REQUEST['publish']))     $this->Message['context']['composition']        =$_REQUEST['publish']=='/' ? '':$_REQUEST['publish'];
	  if(isset($_REQUEST['instancename']))$this->Message['context']['component']          =$_REQUEST['instancename'];
	  if(isset($_REQUEST['instancenum'])) $this->Message['context']['instance']           =$_REQUEST['instancenum'];
	  if(isset($_REQUEST['child']))       $this->Message['context']['child']              =$_REQUEST['child'];

	  if(isset($_REQUEST['json']))         $this->Message['incoming']['json']             =json_decode($_REQUEST['json'], true);
	  if(isset($_REQUEST['xml'])){         $this->Message['incoming']['xml']              =simplexml_load_string($_REQUEST['xml']); $this->Directives[]='xml_service'; }

	  if(isset($this->Message['incoming']['json']) )                                      $this->Directive='json_service';
	  if(isset($this->Message['incoming']['xml']) )                                       $this->Directive='xml_service';
	  
	  if(!isset($this->Message['context']['composition']) && isset($_SERVER['HTTP_REFERER']) && isset($_REQUEST['direct']))
      {
        $t0=explode('://',$_SERVER['HTTP_REFERER'],2);
        $t1=explode('/',$t0[1],2);
        $uri=array( 'protocol'=>$t0[0],'domain'=>$t1[0],'path'=>$t1[1] );
        
        $this->Message['context']['composition']=$uri['path'];
      }

	}


	protected function LinkComposition()
	{
	  /* Composition Interaction Layer, A little complexity automated for you */
	  $Container=array();
      $Context=$this->Message['context'];

      if(isset($Context['composition']))
      {
        print_r($Context['composition']);
        $Context['composition']= RouteFromURL($Context['composition'], true, 0, false);
        Composition::$Active = $Context['composition'];
        
        if( isset($Context['component']) && isset($Context['instance']))
            $LiveSmart = Composition::$Active->ComponentList[ $Context['component'] ][ $Context['instance'] ];
        
        //Same as loop body in Composition->publish() after ResolveComponents()
        $this->LiveComponent = new $Context['component']();
        $this->LiveComponent->createContext($LiveSmart['self'], $LiveSmart['render'], $LiveSmart['data'], $LiveSmart['template']);
        $this->LiveComponent->Load($LiveSmart['options']);
        
//        if(isset($Context['child']))
//            (get_class($this->LiveComponent))::$SaveFlag[(int)$Context['child']]=true;
            
        //print_r($LiveComponent->context['root']->children[(int)$Context['child']]->render());
      }
        
	  if( gettype($this->LiveComponent) === gettype(new Component()) );
	  {
		if( !empty( $_REQUEST['values']) )
		 foreach($_REQUEST['values'] as $key => $value)  $Container[$key]=$value;
		elseif(!empty( $this->Message['incoming']['json']['request']['values']) )
		  $Container = $this->Message['incoming']['json']['request']['values'];
		elseif(!empty( $this->Message['incoming'][ 'xml']['request']['values']) )
		  $Container = $this->Message['incoming'][ 'xml']['request']['values'];

		if(count($Container) > 0)
		  $Context['values']=$Container;
	  }
	}
	protected function Authorize($authorization)
	{
	  /**
	  * Allowing two steps,...
	  * 1.) Ease inheritance, child classes only need to override Verify
	  * 2.) Allow option of two-step authorization to be sandboxed with further method overriding
	  * 3.) Helpful ensuring multiple authorizations are pass-or-fail
	  */
	  if(count($authorization) > 0)
	  {
		$this->authorized=false;
		$this->authorized=$this->Verify($authorization);
	  }
	}

	protected function Verify($authorization)
	{
	  //foreach($authorizations as $level => $authentication) print_r("<br><br>LEVEL: $level <br>AUTH TOKEN: $authentication <br><br>");
	  return true;
	}

	protected function SecureAccess()
	{
		header('Access-Control-Allow-Origin: '.'*');
		//TO DO: Below.
	/*
	  global $RemoteBase;
	  $ecureHTTP = false;
	  if(isset($_SERVER['HTTPS'])) if($_SERVER['HTTPS'] !='' && strtolower($_SERVER['HTTPS']) != 'off') $ecureHTTP = true;      
	  if(isset($_SERVER['HTTP_REFERER']))
	  {
		$host = explode('.'.$RemoteBase,$_SERVER['HTTP_REFERER']);
		$host = explode('://',$host[0]);
		switch($host[1])
		{
		  case 'portal':
		  case 'service':
		  case 'static':
		  case 'www': header('Access-Control-Allow-Origin: http'.($ecureHTTP?'s':'').'://'.$host[1].'.'.$RemoteBase); break;
		  default: break;
		}
	  }
	  elseif($_SERVER['HTTP_HOST'] == 'www'.$RemoteBase) header('Access-Control-Allow-Origin: www.'.$RemoteBase);
	  else header('Access-Control-Allow-Origin: '.'*');
	  */
	}

	public function Receive()
	{
	  switch($this->Directive)
	  {
		case 'json_service': //header('content-type: application/json; charset=utf-8');
		$this->Activity=
		array(
			'authorize' =>$this->Message['authorization'],    //Levels: $Username, $Password, $SiteKey, $LicenseKey, $SSLKey
			'context'   =>$this->Message['context'],  //Holds information about an instantiated object inside of a Composition, can be altered and saved.
			'decoding'  =>'json',
			'encoding'  =>'json',
			'incoming'  =>$this->Message['incoming']['json']
		);
		break;

		case 'xml_service': //header('content-type: text/xml; charset=utf-8');
		$this->Activity=
		array(
			'authorize' =>$this->Message['authorization'],    //Levels: $Username, $Password, $SiteKey, $LicenseKey, $SSLKey
			'callbacks' =>$this->Message['callbacks'], /* Array of string values in php pointers in C++       All callbacks return value of a server function, either return value or "NULL" */
			'context'   =>$this->Message['context'],  //Holds information about an instantiated object inside of a Composition, can be altered and saved.
			'decoding'  =>'xml',
			'encoding'  =>'xml',
			'incoming'  =>$this->Message['incoming']['xml']
		);
		break;

		default:
		$this->Activity=array('decoding'=>'json','encoding'=>'json', 'incoming'=>$_REQUEST);
		
		if(isset($RuntimePath))
		{
		  $fh = fopen($RuntimePath.'/service/transaction/transaction.log', 'w+') or die('No access to transaction log');
		  fwrite($fh, '<<< transaction directive="'.$this->Directive.'">>>' .PHP_EOL. json_encode($this->Message) . PHP_EOL.'<<< /transaction >>>'.PHP_EOL);
		  fclose($fh);
		}
		break;
	  }
	}

	public function Process()
	{
		$result=array();
		$response='';
		$DetectJSON =false;
		$DetectXML  =false;

		if($this->Activity['decoding']=='json')
		{
		  $result['json']= $this->ProcessJSON($this->Activity);
		  $DetectJSON = true;
		}
		elseif($this->Activity['decoding']=='xml')
		{
		  $result['xml']= $this->ProcessXML($this->Activity);
		  $DetectXML = true;
		}

		if($DetectJSON && $DetectXML)   //Favor JSON
			$result['json']['response']['xml']=$result['xml']->asXML();
		elseif($DetectXML && !$DetectJSON)
			$response = $result['xml']->asXML();
		if($DetectJSON)
		{
			$result['json']['origin']=$_REQUEST;
			$response = json_encode($result['json']);
		}

		$this->Response = $response;
	}

	public function Respond()
	{
		print_r($this->Response);
	}

	public function ProcessJSON($activity)
	{

	}
	public function ProcessXML($activity)
	{

	}

//End of Class
}









class Test extends Service
{
	public function Verify($authorization)
	{
		//foreach($authorizations as $level => $authentication) print_r("<br><br>LEVEL: $level <br>AUTH TOKEN: $authentication <br><br>");
		return true;
	}
	public function ProcessJSON($activity)
	{
		$toProcess = $activity['incoming'];
		$activity['outgoing']=$activity;    //still no processing happening T_T;

		return $activity['outgoing'];   //Return value should be a nested array that will be  into a JSON object
	}
}

class AuthenticatedService extends Service
{
	public $options=array();
	public $User;

	public function Verify($authorizations)
	{
		$delimit=' ( ';
		if(!isset($this->options['condition']) ) $this->options['condition'] ='';
		else $delimit = ', ';

		$validated=true;

		foreach($authorizations as $level => $authentication)
		{
		  switch(level)
		  {
			  case 'Username':$options['condition'].= $delimit . ' [Username] IS '. $authentication; $delimit = ', '; break;
			  case 'Password':$options['condition'].= $delimit . ' [Password] IS '. $authentication; $delimit = ', '; break;
			  case 'SiteKey' :$validated = ValidateSiteKey($authentication); if(!validated) $this->Issues['credentials']['SiteKey']=$authentication; break;
			  case 'License' :$validated = ValidateLicense($authentication); if(!validated) $this->Issues['credentials']['License']=$authentication; break;
			  case 'SSL'     :$validated = ValidateSSL($authentication);     if(!validated) $this->Issues['credentials']['SSL']=$authentication; break;
			  default        : break;
		  }
		}
		$options['condition'].=' ) ';

		if($validated)
		{
		  $Users=LoadObjects('Users', $options);
		  if($Users){$this->User=$Users[0];}
		}
		else
		{
			Complain($this->Issues);
			return false;
		}

		return true;
	}
	public function ProcessJSON($activity)
	{
		$activity['incoming'];
		$activity['outgoing']['origin']=$activity['incoming'];
		return $activity['outgoing'];   //Return value should be a nested array that will be json_encode into a JSON object
	}
}







class ComponentEditor extends Service
{
	public $options=array();
	public $User;

	public function ProcessJSON($activity)
	{
		$success=false;

		$req=$activity['incoming'];
		$WorkingSet=array();
		$Which = $activity['context']['child'];
		$response = array();
		/*
		{
		 "request":
		 {
			"UPDATE":
			{
				"tokens":
				{
					"_title":"teaestasdgasdg",
				},
				"PageID":"Smart18",
				"Child":"Smart45",
				"ChildRef":"0"
			}
		  }
		 }
		*/
		if( isset($req['SERVE']) )             //Servable Action  "SERVE"
		{
		   //$this->LiveComponent = $activity['context']['composition']->ComponentList[$activity['context']['component']][$activity['context']['instance']];

		   //$Component = new $activity['context']['component']();
		   //$Component->createContext($this->LiveComponent['render'],$this->LiveComponent['data'], $this->LiveComponent['template']);
		   //$Component->Load($this->LiveComponent['options']);
           echo $this->LiveComponent->context['root']->children[$Which]->render();
           exit();

		   $WorkingSet['render'] = $this->LiveComponent->context['root']->children[$Which];//GetRenderableByPageID($activity['context']['composition']->DOM, $req['SERVE']['PageID']);

		   $response['refresh'][$WorkingSet['render']->pageID] = $WorkingSet['render']->render();
		   //echo ">>>>>"; print_r($response); echo "<<<<<";
		   $success = true;
		}


		if(isset($req['UPDATE']))             //Servable Action "UPDATE"
		{
		   $this->LiveComponent = $activity['context']['composition']->ComponentList[$activity['context']['component']][$activity['context']['instance']];

		   $Component = new $activity['context']['component']();
		   $Component->createContext($this->LiveComponent['render'],$this->LiveComponent['data'], $this->LiveComponent['template']);
		   $Component->Load($this->LiveComponent['options']);

		   $WorkingSet['container'] = GetRenderableByPageID($activity['context']['composition']->DOM, $req['UPDATE']['PageID']);
		   foreach($WorkingSet['container']->children as $Individual)
		   {
				if($Individual->tokens['__self_index'] == $req['UPDATE']['ChildRef'])
					$WorkingSet['render'] = $Individual;
		   }

		   $WorkingSet['render']->markup = GetFile($this->LiveComponent['template']);
		   $dataSet = explode("•••••••••••••••••••••\r\n",$WorkingSet['render']->markup);
		   $WorkingSet['render']->TemplateBinding = json_decode($dataSet[0], true);
		   array_shift($dataSet);
		   $WorkingSet['render']->markup = $dataSet;
		   $WorkingSet['render']->BindContext();
		   $WorkingSet['render']->buildContent();

		   foreach($req['UPDATE']['tokens'] as $token => $newValue)
		   {
				$WorkingSet['render']->tokens[substr($token,1)] = $newValue;
		   }

		   $feedback = $Component->Save($req['UPDATE']['tokens'], $WorkingSet['container']->TemplateBinding);

		   if($feedback = 'CLEAR') $success = true;
		   $response['refresh'][$WorkingSet['render']->pageID] = $WorkingSet['render']->render();
		}

		if( isset($req['PREVIEW']) )             //Servable Action "UPDATE"
		{
		   $this->LiveComponent = $activity['context']['composition']->ComponentList[$activity['context']['component']][$activity['context']['instance']];

		   $Component = new $activity['context']['component']();
		   $Component->createContext($this->LiveComponent['render'],$this->LiveComponent['data'], $this->LiveComponent['template']);
		   $Component->Load($this->LiveComponent['options']);

		   $WorkingSet['container'] = GetRenderableByPageID($activity['context']['composition']->DOM, $req['PREVIEW']['PageID']);
		   foreach($WorkingSet['container']->children as $Individual)
		   {
				if($Individual->tokens['__self_index'] == $req['PREVIEW']['ChildRef'])
					$WorkingSet['render'] = $Individual;
		   }

		   $WorkingSet['render']->markup = GetFile($this->LiveComponent['template']);
		   $dataSet = explode("•••••••••••••••••••••\r\n",$WorkingSet['render']->markup);
		   $WorkingSet['render']->TemplateBinding = json_decode($dataSet[0], true);
		   array_shift($dataSet);
		   $WorkingSet['render']->markup = $dataSet;
		   $WorkingSet['render']->BindContext();
		   $WorkingSet['render']->buildContent();

		   foreach($req['PREVIEW']['tokens'] as $token => $newValue)
		   {
				$WorkingSet['render']->tokens[substr($token,1)] = $newValue;
		   }

		   $WorkingSet['render']->render();
		   $response['refresh'][$WorkingSet['render']->pageID] = $WorkingSet['render']->content;



		  // print_r($response);
		}

		if( isset($req['SETTINGS']) )             //Servable Action "SETTINGS"
		{
		   $WorkingSet['container']=GetRenderableByPageID($activity['context']['composition']->DOM, $req['SETTINGS']['PageID']);

		   $this->LiveComponent = $activity['context']['composition']->ComponentList[$activity['context']['component']][$activity['context']['instance']];

		   $Component = new $activity['context']['component']();

		   $EditorPathSave=substr($this->LiveComponent['template'], strrpos($this->LiveComponent['template'], '/') );
		   $EditorPath=substr($this->LiveComponent['template'],0, strrpos($this->LiveComponent['template'], '/') ) . '/editor'. $EditorPathSave;
		   $Component->createContext($this->LiveComponent['render'],$this->LiveComponent['data'], $EditorPath);
		   $Component->Load($this->LiveComponent['options']);

		   foreach($WorkingSet['container']->children as $Individual)
		   {
				if($Individual->tokens['__self_index'] == $req['SETTINGS']['ChildRef'])
					$WorkingSet['editor'] = $Individual;
		   }

		   $SettingsPathSave=substr($this->LiveComponent['template'], strrpos($this->LiveComponent['template'], '/') );
		   $SettingsPath=substr($this->LiveComponent['template'],0, strrpos($this->LiveComponent['template'], '/') ) . '/settings'. $SettingsPathSave;
		   $Component->createContext($this->LiveComponent['render'],$this->LiveComponent['data'], $SettingsPath);
		   $Component->Load($this->LiveComponent['options']);

		   foreach($WorkingSet['container']->children as $Individual)
		   {
				if($Individual->tokens['__self_index'] == $req['SETTINGS']['ChildRef'])
					$WorkingSet['settings'] = $Individual;
		   }

		   if(isset($WorkingSet['settings']) && isset($WorkingSet['editor']) )
		   {
			 $response['refresh']['ApproachSettings'] = $WorkingSet['settings']->render();
			 $response['refresh'][$req['SETTINGS']['Child']] = $WorkingSet['editor']->render();

			 $success=true;
		   }
		   else $success=false;
		}

		$response['success'] = $success;

		$activity['outgoing']=$response;    //hurray, processing!
		return $activity['outgoing'];   //Return value should be a nested array that will be json_encode into a JSON object
	}
}

?>
