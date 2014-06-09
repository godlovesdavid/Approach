<?php 
require_once(__DIR__.'/../../core.php');
class events_waits_summary_by_instance extends Dataset
{
	public static $profile= array(
		'target' =>'events_waits_summary_by_instance',
		'header'=>array( 
			'EVENT_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'events_waits_summary_by_instance', 'COLUMN_NAME' => 'EVENT_NAME', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'OBJECT_INSTANCE_BEGIN' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'events_waits_summary_by_instance', 'COLUMN_NAME' => 'OBJECT_INSTANCE_BEGIN', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'COUNT_STAR' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'events_waits_summary_by_instance', 'COLUMN_NAME' => 'COUNT_STAR', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'SUM_TIMER_WAIT' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'events_waits_summary_by_instance', 'COLUMN_NAME' => 'SUM_TIMER_WAIT', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'MIN_TIMER_WAIT' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'events_waits_summary_by_instance', 'COLUMN_NAME' => 'MIN_TIMER_WAIT', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'AVG_TIMER_WAIT' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'events_waits_summary_by_instance', 'COLUMN_NAME' => 'AVG_TIMER_WAIT', 'ORDINAL_POSITION' => '6', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'MAX_TIMER_WAIT' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'events_waits_summary_by_instance', 'COLUMN_NAME' => 'MAX_TIMER_WAIT', 'ORDINAL_POSITION' => '7', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
		)
	);
	public $data;
}
?>