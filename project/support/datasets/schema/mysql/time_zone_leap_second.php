<?php 
require_once(__DIR__.'/../../core.php');
class time_zone_leap_second extends Dataset
{
	public static $profile= array(
		'target' =>'time_zone_leap_second',
		'Accessor'=>array( 'Primary' => 'Transition_time'),
		'header'=>array( 
			'Transition_time' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_leap_second', 'COLUMN_NAME' => 'Transition_time', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'Correction' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_leap_second', 'COLUMN_NAME' => 'Correction', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
		)
	);
	public $data;
}
?>