<?php 
require_once(__DIR__.'/../../core.php');
class time_zone_transition extends Dataset
{
	public static $profile= array(
		'target' =>'time_zone_transition',
		'Accessor'=>array( 'Primary' => 'Transition_time'),
		'header'=>array( 
			'Time_zone_id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_transition', 'COLUMN_NAME' => 'Time_zone_id', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'Transition_time' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_transition', 'COLUMN_NAME' => 'Transition_time', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'Transition_type_id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_transition', 'COLUMN_NAME' => 'Transition_type_id', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
		)
	);
	public $data;
}
?>