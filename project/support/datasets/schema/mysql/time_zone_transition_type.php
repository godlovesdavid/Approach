<?php 
require_once(__DIR__.'/../../core.php');
class time_zone_transition_type extends Dataset
{
	public static $profile= array(
		'target' =>'time_zone_transition_type',
		'Accessor'=>array( 'Primary' => 'Transition_type_id'),
		'header'=>array( 
			'Time_zone_id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_transition_type', 'COLUMN_NAME' => 'Time_zone_id', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'Transition_type_id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_transition_type', 'COLUMN_NAME' => 'Transition_type_id', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'Offset' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_transition_type', 'COLUMN_NAME' => 'Offset', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'Is_DST' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_transition_type', 'COLUMN_NAME' => 'Is_DST', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'tinyint',),
			'Abbreviation' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_transition_type', 'COLUMN_NAME' => 'Abbreviation', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
		)
	);
	public $data;
}
?>