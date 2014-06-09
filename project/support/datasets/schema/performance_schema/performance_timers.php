<?php 
require_once(__DIR__.'/../../core.php');
class performance_timers extends Dataset
{
	public static $profile= array(
		'target' =>'performance_timers',
		'header'=>array( 
			'TIMER_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'performance_timers', 'COLUMN_NAME' => 'TIMER_NAME', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'TIMER_FREQUENCY' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'performance_timers', 'COLUMN_NAME' => 'TIMER_FREQUENCY', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'bigint',),
			'TIMER_RESOLUTION' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'performance_timers', 'COLUMN_NAME' => 'TIMER_RESOLUTION', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'bigint',),
			'TIMER_OVERHEAD' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'performance_timers', 'COLUMN_NAME' => 'TIMER_OVERHEAD', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'bigint',),
		)
	);
	public $data;
}
?>