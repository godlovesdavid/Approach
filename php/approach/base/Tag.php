<?php

/*
	Title: Tag Class for Approach


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

//require_once('/../__config_error.php');

class Tag
{
	public static $NO_AUTO_RENDER = ['html', 'head', 'body', 'script', 'style', 'channel', 'rss', 'item','title'];
	public static $AUTOFORMAT_HTML = true;
	public static $index = 0;
	
	public $id = '';

	public $label = 'div';
	public $class = [];
	public $attributes = [];
	
	//(If content and children both empty, default to <selfclosing />)
	public $content; //content contained by the opening and closing tags
	public $children = []; //child tags 

	public $preFilter;
	public $postFilter;
	public $selfclosing = false;

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
		
		//if id not given, set an id.
		if ($this->id === '' && !in_array($this->label, Tag::$NO_AUTO_RENDER))
			$this->id = lcfirst(get_class($this)) . Tag::$index++;
			
		$this->content = $content;
	}

	public function buildClasses()
	{
		//no class.
		if($this->class === null)
			return;
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
		elseif(in_array($this->label,Tag::$NO_AUTO_RENDER))
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

	public function parse($string)
	{
		static $RecurseCount;
		static $depth = 0;
		static $Condition = [];
		static $Conditions = [];
		static $Saved = [];
		static $begin = 0;
		static $found = false;		
	
		$L = strlen($string);
		for($i = 0; $i < $L; ++$i)
		{
			if($string[$i] == '<' && $string[$i+1] == '@' && $string[$i+2] == '-' && $string[$i+3] == '-')	//Start Of Tag Detected
			{
				if($string[$i+4] == ' ' && $string[$i+5] == '/' && $string[$i+6] == ' ' && $string[$i+7] == '-' &&
				 $string[$i+8] == '-' && $string[$i+9] == '@' && $string[$i+10] == '>') //End Injector ' / --@>'
				{
					$Condition['Close']['Start'] = $i;
					$i = $Condition['Close']['End'] = $i+10;
		
					$Evaluate = substr( $string, $Condition['Open']['Start']+4, $Condition['Open']['End']-$Condition['Open']['Start']-8);
					$Evaluate .= PHP_EOL . '{ return 1; } '.PHP_EOL.'else{ return -1; }';
					$Condition['result'] = eval( $Evaluate );	//Template expression blocks: Danger, Warning, Danger!
				}
				else	//Injector Detected
				{
					$Condition['Open']['Start'] = $i;
					$i += 3;
				}
			}
			elseif($string[$i] == '-' && $string[$i+1] == '-' && $string[$i+2] == '@' && $string[$i+3] == '>')	//End Of Tag Detected
			{
				$i = $Condition['Open']['End'] = $i+3;
			}
		}
	
		foreach($Conditions as $Cursor => $Condition)
		{
			$Cursor = $Cursor + 0; //make int?
	
			//Cut Out the markup *between* any if statments
			$RecurseCount++;
			$InnerStatements = substr($string, $Condition['Open']['End']+1, $Condition['Close']['Start'] - $Condition['Open']['End']-1);
			if($Condition['result'] == -1) $InnerStatements = '';
			
			$string = str_replace(substr($string, $Condition['Open']['Start'], $Condition['Close']['End'] - $Condition['Open']['Start']+1 ), $InnerStatements, $string);
	
			if(strpos($InnerStatements, '<@--') != false) $Saved[] = $this->parse($InnerStatements);
			$begin = $Condition['Close']['End'];
		}
		return $string;
	}


	public function buildAttributes()
	{
		$attribsToString = '';
		if(is_array($this->attributes) )
		{
			foreach($this->attributes as $att => $val)
			{
				if(is_array($val))
				{
					foreach($val as $_att => $_val)
					{
						$attribsToString .= ' '.$_att . ' = "'.$_val.'"';
					}
					return $this->attributes = $attribsToString;
				}
				else 
				{
					$attribsToString .= ' '.$att . ' = "'.$val.'"';
				}
			}
			return $this->attributes = $attribsToString;
		}
		elseif(is_string($this->attributes))
		{
			return ' '.$this->attributes;
		}
		else
		{
			$attribsToString = ' data-approach-error = "ATTRIBUTE_RENDER_ERROR"';
		}
		
		return $this->attributes = $attribsToString;
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
		if (Tag::$AUTOFORMAT_HTML)
		{
			for ($i = 0; $i < $level; $i++)
				$indent .= "\t";
			$childrenindent = $indent . "\t";
		}
		
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
//require_once(__DIR__.'/Utility.php');
?>
