<?php 
require_once(__DIR__.'/../../core.php');
class CHARACTER_SETS extends Dataset
{
	public static $profile= array(
		'target' =>'CHARACTER_SETS',
		'header'=>array( 
			'CHARACTER_SET_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'CHARACTER_SETS', 'COLUMN_NAME' => 'CHARACTER_SET_NAME', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'DEFAULT_COLLATE_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'CHARACTER_SETS', 'COLUMN_NAME' => 'DEFAULT_COLLATE_NAME', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'DESCRIPTION' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'CHARACTER_SETS', 'COLUMN_NAME' => 'DESCRIPTION', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'MAXLEN' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'CHARACTER_SETS', 'COLUMN_NAME' => 'MAXLEN', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
		)
	);
	public $data;
}
?>