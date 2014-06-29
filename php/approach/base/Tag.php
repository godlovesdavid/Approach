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
	public $label, $id, $class, $attributes, $content, $children, $selfclosing;

	/**
	* Create a new Tag object with tag type, id, and attributes.
	* Default tag is div.
	*/
	function Tag($label = 'div', $attributes = [], $content = null)
	{
		$this->label = $label;
		
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
			
		$this->content = $content;
	}

	public function buildClasses()
	{
		global $NO_AUTO_RENDER;
		
		//no class.
		if($this->class === null)
		{
			return;
		}
		//classes are in an array.
		if(is_array($this->class) && count($this->class) > 0 )
		{
			$classesToString = '';
			
			foreach($this->class as $style)
				$classesToString .= $style;
				
			return $this->class = ' class = "'.trim($classesToString).'"';
		}
		//a one-class string.
		elseif(is_string($this->class) && $this->class != '')
		{
			return $this->class = ' class = "'.trim($this->class).'"';
		}
		//is a no-auto-render tag? Affix no class.
		elseif(in_array($this->label, $NO_AUTO_RENDER))
		{ 
			return ''; 
		}
		//for all else, affix "renderable renderable_$id" as class.
		else
		{
			$class = lcfirst(get_class($this));
			return ' class = "'.$class .' '. $class .'_'.$this->id . '"';
		}
	}

	public function buildAttributes()
	{
		//attributes is array case.
		if(is_array($this->attributes) )
		{
			$attribsToString = '';
			foreach($this->attributes as $attr => $val)
				$attribsToString .= " $attr = '$val'";
				
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
			return $this->attributes =  " data-approach-error = 'ATTRIBUTE_RENDER_ERROR'";
		}
	}

	/**
	*	Give a string representation of this tag and its children.
	*/
	public function render($level = 0)
	{
		$markup = $this->content;
		$this->content = '';
		
		//make indents.
		$indent = $childrenindent = "";
		for ($i = 0; $i < $level; $i++)
			$indent .= "\t";
		$childrenindent = $indent . "\t";
		
		//render children.
		$childlevel = $level+1;
		foreach($this->children as $renderable)
			$this->content .= PHP_EOL . $childrenindent . $renderable->render($childlevel) . $indent;

		//write attributes and class for own tag, and close it.
		return '<' . $this->label . //open
			($this->id != null			?	' id = "' . $this->id .'"'	: '')	.
			(isset($this->attributes)	?	$this->buildAttributes()	: '')	.
			(isset($this->class)		?	$this->buildClasses()		: '')	.
			($this->selfclosing 		?	'/>' . PHP_EOL 			: '>' .	
			
			$markup . $this->content . '</' . //content (skip if self-containing)
			
			$this->label . '>' . PHP_EOL); //close
	}
}
?>
