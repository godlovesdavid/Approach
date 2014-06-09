<?php 
require_once(__DIR__.'/../../core.php');
class setup_consumers extends Dataset
{
	public static $profile= array(
		'target' =>'setup_consumers',
		'header'=>array( 
			'NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'setup_consumers', 'COLUMN_NAME' => 'NAME', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'ENABLED' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'performance_schema', 'TABLE_NAME' => 'setup_consumers', 'COLUMN_NAME' => 'ENABLED', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
		)
	);
	public $data;
}
?>