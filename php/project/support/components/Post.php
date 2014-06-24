<?php
class Post extends Component
{
	public static $ComponentName='Post';
	public $RenderType = 'SmartTag';
	public $ChildTag = 'li';
	public $ChildClasses = array('nav','nav-pills', 'nav-stacked');
}

?>