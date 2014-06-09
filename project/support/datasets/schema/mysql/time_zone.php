<?php 
require_once(__DIR__.'/../../core.php');
class time_zone extends Dataset
{
	public static $profile= array(
		'target' =>'time_zone',
		'Accessor'=>array( 'Primary' => 'Time_zone_id'),
		'header'=>array( 
			'Time_zone_id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone', 'COLUMN_NAME' => 'Time_zone_id', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'Use_leap_seconds' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'time_zone', 'COLUMN_NAME' => 'Use_leap_seconds', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
		)
	);
	public $data;
}
?>