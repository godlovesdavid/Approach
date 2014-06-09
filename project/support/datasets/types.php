<?php 
require_once(__DIR__.'/../../core.php');
class types extends Dataset
{
	public static $profile= array(
		'target' =>'types',
		'Accessor'=>array( 'Primary' => 'id'),
		'header'=>array( 
			'id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'types', 'COLUMN_NAME' => 'id', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'parent' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'types', 'COLUMN_NAME' => 'parent', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'pointer' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'types', 'COLUMN_NAME' => 'pointer', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'name' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'types', 'COLUMN_NAME' => 'name', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
		)
	);
	public $data;
}
?>