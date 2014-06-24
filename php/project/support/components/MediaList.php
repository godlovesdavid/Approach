<?php
class MediaList extends Component
{
	public static $ComponentName='MediaList';
	public $ChildTag='ul';
	public $RenderType = 'SmartTag';

	public $ContainerClasses = array('MediaList', 'media-list');
}
?>