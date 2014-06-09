<?php 
require_once(__DIR__.'/../../core.php');
class time_zone_name extends Dataset
{
	public static $profile= array(
		'target' =>'time_zone_name',
		'Accessor'=>array( 'Primary' => 'Name'),
		'header'=>array( 
			'Name' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_name', 'COLUMN_NAME' => 'Name', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'Time_zone_id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone_name', 'COLUMN_NAME' => 'Time_zone_id', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
		)
	);
	public $data;
}
?>