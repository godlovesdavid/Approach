<?php

/*
	Title: Renderale Utility Functions for Approach


	Copyright 2002-2014 Garet Claborn

	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at

	http://www.apache.org/licenses/LICENSE-2.0

	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License.

*/


require_once('Render.php');
global $RuntimePath;
global $InstallPath;
global $UserPath;
global $StaticFiles;
global $DeployPath;
global $ApproachDebugMode;
global $ApproachDebugConsole;

//if(!isset($ApproachServiceCall)) $ApproachServiceCall = true;
if(!isset($RuntimePath)) $RuntimePath = __DIR__.'/../..'; //if no runtime path, escape from the approach directory

$ApproachDebugConsole = new renderable('div', 'ApproachDebugConsole');
$ApproachDebugMode = false;
function approach_dump($refer)
{
	ob_start();
	var_dump($refer);
	$r=ob_get_contents();
	ob_end_clean();
	return $r;
}

/*

These functions let you primarily search through types of class renderable by
common CSS selectors such as ID, Class, Attribute and Tag. 

Also the JavaScript Events have a require listed at the bottom of this source
JavaScript events need to look for your </head> element *or* the  </body> elemenet
and dynamically place event bindings, script linking or direct code at these 
locations.


Use 

$Collection = RenderSearch($anyRenderable,'.Buttons'); 

Or Directly


$SingleTag=function GetRenderable($SearchRoot, 1908);                       //System side render ID $renderable->id;
$SingleTag=function GetRenderableByPageID($root,'MainContent');             //Client side page ID

$MultiElements=function GetRenderablesByClass($root, 'Buttons');
$MultiElements=function GetRenderablesByTag($root, 'div');


*/

function filterXML( $tag, $content, $styles, $properties)
{
    $output='<' . $tag;
    foreach($this->$properties as $property => $value)
    {
        $output .= ' '.$property.'="'.$value.'"';
    }
    $output .= ' class="';
    foreach($this->$styles as $class)
    {
        $output .= $class.' ';
    }
    $output .= '"'. 'id="'.$tag . $this->$id . '">';
    $output .=$content . '</'.$tag.'>';
}

function toFile($filename, $data)
{
    $fh = fopen($filename, 'w') or die('cant open that file');
    fwrite($fh, $data);
    fclose($fh);
}


function GetFile($path, $override=false)
{
    //return file_get_contents($path);
    global $APPROACH_REGISTERED_FILES;
    if(!isset($APPROACH_REGISTERED_FILES[$path]) || $override) $APPROACH_REGISTERED_FILES[$path] = file_get_contents($path);
    return $APPROACH_REGISTERED_FILES[$path];

}    //Local Scope File Caching

function curl($url)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
function Blame($Container)
{
    $Reason='';
    foreach($Container as $key => $value)
    {
        $Reason.=('Key: '. $key .' Value: '. $value ."\r\n");
    }
    exit($Reason);
}
function Complain($Container)
{
    $Reason='';
    foreach($Container as $key => $value)
    {
        $Reason.=('Key: '. $key .' Value: '. $value ."\r\n");
    }
    print_r($Reason);
    return false;
}








//function _($root, $search){    return RenderSearch($root, $search); }
function RenderSearch(&$root, $search)
{
    $scope = $search[0];
    $search = substr($search, 1);
    $renderObject;
    switch($scope)
    {
        case '@': $renderObject=GetRenderable($root, $search); break;
        case '#': $renderObject=GetRenderableByPageID($root, $search); break;
        case '.': $renderObject=GetRenderablesByClass($root, $search); break;
        default:  $renderObject=GetRenderableByTag($root, $search); break;
    }

    return $renderObject;
}

function GetRenderable(&$SearchRoot, $SearchID)
{
    if($SearchRoot->id == $SearchID) return $SearchRoot;

    foreach($SearchRoot->children as $renderObject)
    {
            $result = GetRenderable($renderObject,$SearchID);
            if($result instanceof renderable)
            {
                if($result->id == $SearchID) return $result;
            }
    }
}



function GetRenderablesByTag(&$root, $tag)
{
    $Store=Array();

    foreach($root->children as $child)   //Get Head
    {
        if($child->tag == $tag)
        {
            $Store[]=$child;
        }
        foreach($child->$children as $children)
        {
            $Store = array_merge($Store, GetRenderablesByTag($children, $tag));
        }
    }
    return $Store;
}

function GetRenderablesByClass(&$root, $class)
{
    $Store = array();

    foreach($root->children as $child)   //Get Head
    {
        $t=$child->classes;
        $child->buildClasses();

        if(strpos($child->classes,$class))
        {
            $Store[]=$child;
        }
        foreach($child->children as $children)
        {
            $Store = array_merge($Store, GetRenderablesByClass($children, $class));
        }
        $child->classes=$t;
    }
    return $Store;
}

function GetRenderableByPageID(&$root,$PageID)
{
    $Store = new renderable('div');
    $Store->pageID = 'DEFAULT_ID___ELEMENT_NOT_FOUND';
    foreach($root->children as $child)   //Get Head
    {
        if($child->pageID == $PageID)
        {
            $Store = $child;
            return $child;
        }
        foreach($child->children as $children)
        {
            $Store = GetRenderableByPageID($children, $PageID);
            if($Store->pageID == $PageID) return $Store;
        }
    }
    return $Store;
}


function ArrayFromURI(&$uri)
{
    $result=array();
    $uri = urldecode($uri);
    $exts=array('.aspx','.asp','.jsp','.php','.html','.htm','.rhtml','.py','.cfm','.cfml', '.cpp', '.c', '.ruby','.dll', '.asm');
    $uri = str_replace($exts, '', $uri);
    $result = explode('/',$uri);

    for($i=0, $L=count($result); $i<$L; $i++)
    {
        if($result[$i] == '' || empty($result[$i])){ unset($result[$i]); continue; }
        else $result[$i] = strtolower($result[$i]);
    }

    return  array_values($result);
}







?>
