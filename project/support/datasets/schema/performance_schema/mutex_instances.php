<?php 
require_once(__DIR__.'/../../core.php');
class mutex_instances extends Dataset
{
	public static $profile= array(
		'target' =>'mutex_instances',
		'header'=>array( 
			'NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'mutex_instances', 'COLUMN_NAME' => 'NAME', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'OBJECT_INSTANCE_BEGIN' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'mutex_instances', 'COLUMN_NAME' => 'OBJECT_INSTANCE_BEGIN', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'LOCKED_BY_THREAD_ID' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'mutex_instances', 'COLUMN_NAME' => 'LOCKED_BY_THREAD_ID', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'int',),
		)
	);
	public $data;
}
?>