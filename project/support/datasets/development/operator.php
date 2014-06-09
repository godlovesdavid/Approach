<?php 
require_once(__DIR__.'/../../core.php');
class operator extends Dataset
{
	public static $profile= array(
		'target' =>'operator',
		'Accessor'=>array( 'Primary' => 'id'),
		'header'=>array( 
			'id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'operator', 'COLUMN_NAME' => 'id', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'group' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'operator', 'COLUMN_NAME' => 'group', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'rank' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'operator', 'COLUMN_NAME' => 'rank', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'user' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'operator', 'COLUMN_NAME' => 'user', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'operator' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'operator', 'COLUMN_NAME' => 'operator', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'keyauth' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'operator', 'COLUMN_NAME' => 'keyauth', 'ORDINAL_POSITION' => '6', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'log' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'operator', 'COLUMN_NAME' => 'log', 'ORDINAL_POSITION' => '7', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'message' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'operator', 'COLUMN_NAME' => 'message', 'ORDINAL_POSITION' => '8', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'setting' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'operator', 'COLUMN_NAME' => 'setting', 'ORDINAL_POSITION' => '9', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
		)
	);
	public $data;
}
?>