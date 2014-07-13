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

/*
*	David's version of renderable that's simplified:
*	-constructing is now "new Tag(tagname, attributes, content)"
*	-attribute values are surrounded by single instead of double quotes for variable interpolation
*/
class Tag
{
	//content is stuff contained by open and close tags
	public $tagname, $attributes, $content, $children = [], $selfclosing;

	/**
	* Create a new Tag object with tag type, id, and attributes.
	* @param string $tagname name of tag, as in <tagname>.
	* @param array $attributes list of attributes like id or class.
	* @content text contained within the open and close of this Tag: <open>content</close>
	*/
	function Tag($tagname, $attributes = [], $content = null)
	{
		$this->tagname = $tagname;
		$this->attributes = $attributes;
		$this->content = $content;
	}

	/**
	*	Give a string representation of this tag and its content and children.
	*/
	public function render()
	{
		//render children.
		$childrenrender = '';
		foreach($this->children as $child)
			$childrenrender .= $child->render();
				
		//render self.
		$attstr = '';
		foreach($this->attributes as $att => $val)
			$attstr .= " $att='$val'";
		return "<$this->tagname$attstr" . ($this->selfclosing ? "/>" : ">$this->content$childrenrender</$this->tagname>");
	}
	
	/**
	*	Tidied render.
	*	@param int $level indentation level
	*/
	public function renderFormatted($level = 0)
	{
		//make indents.
		$indent = $childrenindent = '';
		for ($i = 0; $i < $level; $i++)
			$indent .= "\t";
		$childrenindent = "$indent\t";
		
		//render children.
		$childlevel = $level + 1;
		$childrenrender = '';
		foreach($this->children as $child)
			$childrenrender .= "\n$childrenindent" . $child->renderFormatted($childlevel) . $indent;

		//render self.
		$attstr = '';
		foreach($this->attributes as $att => $val)
			$attstr .= " $att='$val'";
		return "<$this->tagname$attstr" . ($this->selfclosing ? "/>\n" : ">$this->content$childrenrender</$this->tagname>\n");
	}
}
?>
