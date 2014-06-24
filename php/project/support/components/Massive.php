<?php
class Massive extends Component
{
	public static $ComponentName='Massive';
	public $RenderType = 'Smart';
	public $ChildTag = 'li';

	public $ChildClasses = array
	(
		'SlideMarkup' => array
		(
			'Slide'
		),
		'ControlMarkup' => array
		(
			'ControlButton'
		)
	);

	public $ContainerClasses = array('Massive');
}
?>