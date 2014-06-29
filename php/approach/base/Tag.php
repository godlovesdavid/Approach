<?php
/*
	Title: Tag Class for Approach


	Copyright 2002-2014 Garet Claborn, David Hsu

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

$NO_AUTO_RENDER = ['html', 'head', 'body', 'script', 'style', 'channel', 'rss', 'item', 'title'];

/*
*	David's version of renderable that's simplified.
*	Simplifications include: 
*	-constructing renderables are now: new Tag(taglabel, attributes, content)
*	-but must specify options templates and selfclosing in another statement
*	-attribute values are surrounded by single quotes instead of double (for PHP variable interpolation).
*/
class Tag
{
	//content is stuff contained by open and close tags
	public $tagname, $id, $class, $attributes, $content, $children = [], $selfclosing;

	/**
	* Create a new Tag object with tag type, id, and attributes.
	* @param string $tagname name of tag, as in <tagname>.
	* @param array $attributes list of attributes like id or class.
	* @content html text contained within the open and close of this Tag: <open>content</close>
	*/
	function Tag($tagname = 'div', $attributes = [], $content = null)
	{
		//get tagname.
		$this->tagname = $tagname;
		
		//get attributes.
		foreach ($attributes as $attr => $val)
			if ($attr == 'id')
				$this->id = $val;
			else if($attr == 'class') 
				$this->class = $val;
			else 
				$this->attributes[$attr] = $val;
				
		//If content and children both empty, default to <selfclosing />
		if ($this->content === null && $this->children === null)
			$this->selfclosing = true;
		else 
			$this->selfclosing = false;
		
		//get content.
		$this->content = $content;
	}

	/**
	*	Properly reset classes and write them in HTML format.
	*/
	function buildClasses()
	{
		//No class? Return blank.
		if($this->class === null)
		{
			return '';
		}
		
		//Class field not a string? Stringify and return it.
		if(is_array($this->class) && count($this->class) > 0 )
		{
			$classesToString = '';
			
			foreach($this->class as $style)
				$classesToString .= $style;
				
			return $this->class = " class = '" . trim($classesToString) . "'";
		}
		
		//class field already a string? Trim and return that.
		elseif(is_string($this->class) && $this->class != '')
		{
			return $this->class = " class = '" . trim($this->class) . "'";
		}
		
		//a no-auto-render tag? Return blank.
		elseif(in_array($this->tagname,Tag::$NO_AUTO_RENDER))
		{ 
			$this->selfclosing = true;
			return ''; 
		}
		
		//for all else, return 'renderable renderable_$id' as class.
		else
		{
			$class = lcfirst(get_class($this));
			return " class = '$class $class_$this->id'";
		}
	}

	/**
	*	Properly reset attributes and write them in HTML format.
	*/
	function buildAttributes()
	{
		$attribsToString = '';
		
		//attributes is array case.
		if(is_array($this->attributes) )
		{
			foreach($this->attributes as $att => $val)
			
				//further parse if value is also an array.
				if(is_array($val))
				{
					foreach($val as $_att => $_val)
						$attribsToString .= " $_att = '$_val'";
						
					return $this->attributes = $attribsToString;
				}
				
				//build string normally if not array.
				else 
				{
					$attribsToString .= " $att = '$val'";
				}
				
			return $this->attributes = $attribsToString;
		}
		
		//attributes is string case.
		elseif(is_string($this->attributes))
		{
			return " $this->attributes";
		}
		
		//attributes is unexpectedly neither string nor array.
		else
		{
			$attribsToString = " data-approach-error = 'ATTRIBUTE_RENDER_ERROR'";
		}
		
		//re-set attributes to its proper format, and return it.
		return $this->attributes = $attribsToString;
	}


	/**
	*	Give a string representation of this tag and its children.
	*/
	public function render()
	{
		$markup = $this->content;
		$this->content = '';
		
		//render children to content.
		foreach($this->children as $child)
			$this->content .= $child->render();

		//render self.
		return "<$this->tagname" . //open
			($this->id != null			?	" id = '$this->id'"	: '')	.
			(isset($this->attributes)	?	$this->buildAttributes()	: '') .
			(isset($this->class)		?	$this->buildClasses()		: '') .
			($this->selfclosing 		?	"/>" 						: ">$markup$this->content</$this->tagname>"); //close
	}
	
	/**
	*	render as above, but tidied HTML.
	*	@param int $level indentation level
	*/
	public function renderFormatted($level = 0)
	{
		$markup = $this->content;
		$this->content = '';
		
		//make indents.
		$indent = $childrenindent = '';
		for ($i = 0; $i < $level; $i++)
			$indent .= "\t";
		$childrenindent = "$indent\t";
		
		//render children to content.
		$childlevel = $level + 1;
		foreach($this->children as $child)
			$this->content .= "\n$childrenindent" . $child->renderFormatted($childlevel) . $indent;

		//render self.
		return "<$this->tagname" . //open
			($this->id != null			?	" id = '$this->id'"	: '')	.
			(isset($this->attributes)	?	$this->buildAttributes()	: '') .
			(isset($this->class)		?	$this->buildClasses()		: '') .
			($this->selfclosing 		?	"/>\n" 						: ">$markup$this->content</$this->tagname>\n"); //close
	}
}
?>
