<?php

//require_once(__DIR__ . '/../../approach/core/Service.php');
require_once(__DIR__ . '/../core.php');
require_once($InstallPath.'/base/Renderables/DisplayUnits.php');

//require_once('Datasets/composistions.php');
//require_once('Datasets/components.php');

global $ApproachDisplayUnit;

$register = array( );
$register['Composition']=array();
$register['Component']=array();
$register['Asset']=array();
$register['Authorize']=array();
$register['Moderate']=array();
$register['Admin']=array();
$ID=0;

$ApproachDisplayUnit = array();
$ApproachDisplayUnit['User']['Browser'] = new renderable('ul');

class UserInterface extends renderable
{
  public $Layout;
  public $Header;   //in layout
  public $Titlebar; //in header
  public $Content;	//in layout
  public $Footer;	//in layout
  public $title='';

  function UserInterface()
  {
    $this->tag	        = 'ul';
    $this->classes[]	= 'Interface';
    $this->children[]	= $this->Layout = new renderable('li','',	array('classes'=>'InterfaceLayout') );

    $this->Layout->children[]	= $this->Header = new renderable('ul','',	array('classes'=>array('Header','controls')));
    $this->Layout->children[]	= $this->Content	= new renderable('ul','',	array('classes'=>array('Content','controls')));
    $this->Layout->children[]	= $this->Footer	= new renderable('ul','',	array('classes'=>array('Footer','controls')));

    $this->Header->children[]	= $this->Titlebar	= new renderable('li','',	array('classes'=>array('Titlebar'),'content'=>($this->title | 'Command Console')));
  }
}

class Wizard extends UserInterface
{
  public $Slides;
  public $CancelButton;
  public $BackButton;
  public $NextButton;
  public $FinishButton;

  function Wizard()
  {
    UserInterface::UserInterface();
    $this->title = 'Complete actions by following steps';
    $this->classes[]	= 'Wizard';
    
    $this->Footer->children[]	= $this->CancelButton	= new renderable('li','',	array('classes'=>array('Cancel',  'DarkRed',	'Button'),'content'=>'Cancel'));
    $this->Footer->children[]	= $this->BackButton	    = new renderable('li','',	array('classes'=>array('Back',	  'DarkGreen',	'Button'),'content'=>'Back'));
    $this->Footer->children[]	= $this->NextButton	    = new renderable('li','',	array('classes'=>array('Next',	  'DarkGreen',	'Button'),'content'=>'Next'));
    $this->Footer->children[]	= $this->FinishButton	= new renderable('li','',	array('classes'=>array('Finish',  'DarkBlue',	'Button'),'content'=>'Finish'));

    $this->FinishButton->attributes['data-intent']='Autoform Insert ACTION';
  }
}


$register['Instance']['New'] = function($arguments,$support){ var_dump($arguments,$support); };

$register['Wizard']['Insert'] = function($arguments,$support)
{
  global $ApproachDisplayUnit;
  global $register;
  $DBO;

  foreach($arguments['Autoform']['Insert'] as $name => $database)
  {
    $name = str_replace('http://service-dev.approach.im/','',$name);
    $DBO = new $name($name);

     foreach($database as $column => $entry)
     {
        $DBO->data[$column] = $entry;
     }

     $ID = $DBO->Save();
  }

  $opts = array('http' =>array(
    'method'  => 'POST',
    'header'  => 'Content-type: application/x-www-form-urlencoded',
    'content' => 'apples'
  ));

$context  = stream_context_create($opts);
$result = file_get_contents('http://service.approachfoundation.org/YoutubeApi.php?youtubeid='.$DBO->data['archiveid'] .'&channelid='.$ID, false, $context);

  $WorkData['result'] = $result;
  $WorkData['render'] = '<h2>Status OK!</h2>';
  return $WorkData;
};

$register['Composition']['Wizard'] = function($arguments, $support)
{
  $Wizard=new Wizard();
  $WorkData['render'] = $Wizard->render();

  return $WorkData;  
};





$register['Composition']['Browser'] = function($arguments, $support)
{
  global $ApproachDisplayUnit;

  $tempchild = new renderable('li');
  $tempchild->content = 'Sorry, there was an error.';

  $categories = LoadObjects('types', $options=Array('range'=>'*'));
  $publicationCategories =array();

  $MiniDOM = new renderable('ul');

  if(isset($arguments['target']))
  {
    $publications = LoadObjects('compositions', $options=Array('range'=>'*','condition'=>' type EQUALS ' . $arguments['target']['types'] . ' ' ));
    foreach($publications as $publication)
    {
      $nestedCompositions = LoadObjects('compositions', $options=Array('range'=>'*','condition'=>' [parent] EQUALS ' . $publication['id'] . ' '));
  
      foreach($nestedCompositions as $childPub)
      {
          $nestlevel[$childPub['title']] = $childPub;
      }
  
      $ta->attributes['types'] =  $publication['types'];
      $ta->attributes['publish']  =  $publication['id'];
      $ta->attributes['title']    =  $publication['title'];
  
      $tempchild=new renderable('li', '', array('data-intent'=>htmlspecialchars('{"ACTION":{"Composition":"Browser"}}'), 'attributes'=>$ta) );
  
      $childContent = new renderable('input', 'Interface1'.$support['NestedLevel'], array('attribute'=>array('type'=>'checkbox')) );
      $childContent->children = new renderable('label','',array('attribute'=>array('for'=>'somethingGoesInHere')));
      $tempchild->children[] = $childContent;
    }
  }
  else
  foreach($categories as $types)
  {
    if($types->data['id'] == 2)
    $publicationCategories[]=$types->data;
    
    var_dump($support);

    $ta =  $support['target']['types'];
    $ta =  $support['target']['publish'];
    $ta =  $support['target']['title'];

    $tempchild=new renderable('li', '', array('classes'=>'Composition Browser ACTION', 'attributes'=>$ta) );
  }

  $MiniDOM->children[]= $tempchild;

  $WorkData['render'] = $MiniDOM->render();
  return $WorkData;
};




$register['User']['Browser'] = function($arguments, $support)
{
  global $ApproachDisplayUnit;

  $child = new renderable('li');
  $child->content = 'Sorry, there was an error.';

  $categories = LoadObjects('Categories', $options=Array('range'=>'*'));
  $publicationCategories =array();

  $MiniDOM = new renderable('ul');

  $data=$arguments['target']['owner'];

  $nestlevel = array();
  $rootPub;

  $OwnedProperty = explode(',',$data['owns']);
  $OwnedProperty = array_values($OwnedProperty);
  $publications = array();
  foreach($OwnedProperty as $Property)
  {
    $Property = $Property + 0;
    if($Property != 0) $publications[] = LoadObject('Compositions', array('condition'=>' [id] = '. $Property .' '));
  }

  foreach($publications as $publication)
  {
    $ChildCompositions = LoadObjects('Compositions', array('range'=>'*','condition'=>' [Parent] = ' . $publication->data['id'] . ' '));

    $attr['types'] =  $publication->data['types'];
    $attr['publish']  =  $publication->data['id'];
    $attr['title']    =  $publication->data['title'];
    $attr['isroot']    = $publication->data['root'];


    $rootPub=new renderable(array('tag'=>'li','classes'=>'Composition Browser ACTION', 'attributes'=>$attr) );
    $rootContent = new renderable(array('tag'=>'input','selfcontained'=>true,'attributes'=>array('type'=>'checkbox')) );
    $rootPub->children[] = $rootContent;
    $rootContent = new renderable(array('tag'=>'label','content'=>$publication->data['alias'],'attributes'=>array('for'=>$rootContent->pageID)));
    $rootPub->children[] = $rootContent;

    if(count($ChildCompositions)> 0 )
    {
      $branch = new renderable('ul');
      foreach($ChildCompositions as $ChildPub)
      {
          $GrandchildCompositions = LoadObjects('Compositions', array('range'=>'*','condition'=>' [Parent] = ' . $ChildPub->data['id'] . ' '));

          $attr['types'] =  $ChildPub->data['types'];
          $attr['publish']  =  $ChildPub->data['id'];
          $attr['title']    =  $ChildPub->data['title'];

          $child=new renderable(array('tag'=>'li','classes'=>'Composition Browser ACTION', 'attributes'=>$attr) );
          $childContent = new renderable(array('tag'=>'input','selfcontained'=>true,'attributes'=>array('type'=>'checkbox')) );
          $child->children[] = $childContent;
          $childContent = new renderable(array('tag'=>'label','content'=>$ChildPub->data['alias'],'attributes'=>array('for'=>$childContent->pageID)));
          $child->children[] = $childContent;

          if(count($GrandchildCompositions)> 0 )
          {
            $branch2 = new renderable('ul');
            foreach($GrandchildCompositions as $GrandchildPub)
            {
                $attr['types'] =  $GrandchildPub->data['types'];
                $attr['publish']  =  $GrandchildPub->data['id'];
                $attr['title']    =  $GrandchildPub->data['title'];

                $grandchild=new renderable(array('tag'=>'li','classes'=>'Composition Browser ACTION', 'attributes'=>$attr) );
                $grandchildContent = new renderable(array('tag'=>'input','selfcontained'=>true,'attributes'=>array('type'=>'checkbox')) );
                $grandchild->children[] = $grandchildContent;
                $grandchildContent = new renderable(array('tag'=>'label','content'=>$GrandchildPub->data['alias'],'attributes'=>array('for'=>$grandchildContent->pageID)));
                $grandchild->children[] = $grandchildContent;
                $branch2->children[]=$grandchild;
            }
            $child->children[]=$branch2;
          }
          $branch->children[]=$child;
        }
        $rootPub->children[]=$branch;
      }
      $MiniDOM->children[]= $rootPub;
  }

  $WorkData['render'] = $MiniDOM->render();
  return $WorkData;
};








$register['Composition']['FeedWizard'] = function($arguments, $support)
{
  global $ApproachDisplayUnit;
  return $ApproachDisplayUnit["Composition"]["FeedWizard"];
};

$register['Composition']['NewsLetterWizard'] = function($arguments, $support)
{
  global $ApproachDisplayUnit;
  return $ApproachDisplayUnit["Composition"]["NewWizard"];
};



//-----------------------------------------------------------------------------------
$register['Component']['Update']= function($arguments, $support)
{
  $WorkingData['container'] = GetRenderableByPageID($support['context']['publication']->DOM, $arguments['PageID']);

  foreach($WorkingData['container']->children as $Individual)
  {
      if($Individual->tokens['__self_index'] == $arguments['ChildRef'])
          $WorkingData['render'] = $Individual;
  }

  $WorkingData['render']->markup = GetFile($this->LiveComponent['template']);
  $dataSet = explode("•••••••••••••••••••••\r\n",$WorkingSet['render']->markup);
  $WorkingData['render']->TemplateBinding = json_decode($dataSet[0], true);
  array_shift($dataSet);
  $WorkingData['render']->markup = $dataSet;
  $WorkingData['render']->BindContext();
  $WorkingData['render']->buildContent();

  foreach($arguments['tokens'] as $token => $newValue)
  {
      $WorkingData['render']->tokens[substr($token,1)] = $newValue;
  }

  $feedback = $support['ActiveComponent']->Save($arguments['tokens'], $WorkingData['container']->TemplateBinding);

  if($feedback == 'CLEAR') $success = true;
  $response['refresh'][$WorkingData['render']->pageID] = $WorkingData['render']->render();

  return $WorkData;
};


$ApproachRegisteredService = $register;
?>