<?php 
require_once(__DIR__.'/../../core.php');
class compositions extends Dataset
{
	public static $profile= array(
		'target' =>'compositions',
		'Accessor'=>array( 
			'Primary' => 'id',
			'Reference'=>array(  array('development','types','id'), array('development','operator','id'),)),
		'header'=>array( 
			'id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'id', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'owner' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'owner', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '1', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'meta' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'meta', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'bigint',),
			'content' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'content', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'parent' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'parent', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'type' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'type', 'ORDINAL_POSITION' => '6', 'COLUMN_DEFAULT' => '1', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'self' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'self', 'ORDINAL_POSITION' => '7', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'int',),
			'root' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'root', 'ORDINAL_POSITION' => '8', 'COLUMN_DEFAULT' => 'b\'0\'', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bit',),
			'active' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'active', 'ORDINAL_POSITION' => '9', 'COLUMN_DEFAULT' => 'b\'1\'', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bit',),
			'title' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'title', 'ORDINAL_POSITION' => '10', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'alias' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'alias', 'ORDINAL_POSITION' => '11', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'tags' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'tags', 'ORDINAL_POSITION' => '12', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'media' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'compositions', 'COLUMN_NAME' => 'media', 'ORDINAL_POSITION' => '13', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
		)
	);
	public $data;
}
?>