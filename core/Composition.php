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

require_once('Component.php');

class Composition
{
    public static $Active;
    public $DOM;
	public $ComponentList=Array();
    public $InterfaceMode=false;

    public $context=array();
	public $options;
	public $meta;
	public $intents;

	public $Interfaceable=Array();

	function Composition($options=array(), $activiate=false)
	{
		if($activiate) $this::$Active =&$this;
		$this->options = $options;
	}
	
	public function ResolveComponents(&$DOM)
	{
		$InterfaceCount=0;
		foreach($DOM->children as $child)
		{
			if($child instanceof Smart)
			foreach($child->context as $WhichComponent => $InstanceContext)
			{
				$this->ComponentList[$WhichComponent][]=$InstanceContext;
				if($this->InterfaceMode)
				{
				  if(!in_array($child->tag,renderable::$NoAutoRender))
				  {
					if($child->pageID=='') $child->pageID = $child->tag.'_'.$child->id;
					$child->classes[] = 'Interface';
					$child->attributes['data-component']=$WhichComponent;
					$child->attributes['data-role']='EditGroup';
					$this->Interfaceable[$InterfaceCount]['name'] = $WhichComponent;
					$this->Interfaceable[$InterfaceCount]['index'] = count($this->ComponentList[$WhichComponent])-1;
					$this->Interfaceable[$InterfaceCount]['reference']=$child;
					$InterfaceCount++;
				  }
				}
            }
			if($child->children != null) $this->ResolveComponents($child);
		}
	}

	function ActivateInterface()
	{
		foreach($this->Interfaceable as &$Interfaceable)
		{
			$references=array();
			if(!empty($Interfaceable['reference']->children))
			{
                $refCount=0;
				foreach($Interfaceable['reference']->children as $child)
				{
                    if($child->pageID=='') $child->pageID = $child->tag.'_'.$child->id;
					$child->classes[]='controls';
                    $child->attributes['data-role']='Interfaceable';
                    $child->attributes['data-component']=$Interfaceable['name'];
                    $child->attributes['data-self']=$refCount;
					$references[]=$child->pageID;
                    ++$refCount;
				}
			}
			$Interfaceable['reference']=$references;	//Links to child template's $tokens['__self_id']
		}
	}

	function prepublish($silent=false)
	{
		$this->ResolveComponents($this->DOM);
	}
	
	function publish($silent=false)
	{
		global $RegisteredScripts;

		global $ApproachDebugConsole;
		global $ApproachDebugMode;

		$this->ResolveComponents($this->DOM);

		foreach($this->ComponentList as $ComponentName => $Instances)
		{
			foreach($Instances as $Context)
			{
				$Component = new $ComponentName();
				$Component->createContext($Context['self'], $Context['render'], $Context['data'], $Context['template']);
				$Component->Load($Context['options']);
				//$this->DOM->children[1]->children[count($this->DOM->children[1]->children)-1]->content=var_export($Component,true);
			}
		}
		$this->ActivateInterface();

/*
        RegisterJQueryEvent('BUBBLE_CLASS_CLICK', 'InterfaceableFeature', $SettingsServiceCall);
        RegisterJQueryEvent('BUBBLE_ID_CLICK', 'ApproachControlUnit', $UpdateServiceCall .PHP_EOL. $PreviewServiceCall);
        RegisterScript($JqueryReadyFunction, true, "To Feature Editor");
        CommitJQueryEvents();
*/
		foreach($this->DOM->children as $child)   //Get Body
		{
			if($child->tag == 'body')
			{
				if($ApproachDebugMode)  $child->children[]=$ApproachDebugConsole;
				$child->children[]=$RegisteredScripts;
				break;
			}
		}

		/*  THIS IS WHERE THE HEADER SHOULD GET SENT	*/
//		header('Access-Control-Allow-Origin: *');
        if(!$silent) print_r('<!DOCTYPE html>'.PHP_EOL.$this->DOM->render()); //Deploy html response - usually
		elseif($silent && isset($this->options['toFile'])) toFile($this->options['toFile'], $this->DOM->render());
	
	}
}

?>