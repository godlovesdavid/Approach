<?php 
require_once(__DIR__.'/../../core.php');
class REFERENTIAL_CONSTRAINTS extends Dataset
{
	public static $profile= array(
		'target' =>'REFERENTIAL_CONSTRAINTS',
		'header'=>array( 
			'CONSTRAINT_CATALOG' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'CONSTRAINT_CATALOG', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'CONSTRAINT_SCHEMA' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'CONSTRAINT_SCHEMA', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'CONSTRAINT_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'CONSTRAINT_NAME', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UNIQUE_CONSTRAINT_CATALOG' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'UNIQUE_CONSTRAINT_CATALOG', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UNIQUE_CONSTRAINT_SCHEMA' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'UNIQUE_CONSTRAINT_SCHEMA', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UNIQUE_CONSTRAINT_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'UNIQUE_CONSTRAINT_NAME', 'ORDINAL_POSITION' => '6', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'MATCH_OPTION' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'MATCH_OPTION', 'ORDINAL_POSITION' => '7', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UPDATE_RULE' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'UPDATE_RULE', 'ORDINAL_POSITION' => '8', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'DELETE_RULE' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'DELETE_RULE', 'ORDINAL_POSITION' => '9', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'TABLE_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'TABLE_NAME', 'ORDINAL_POSITION' => '10', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'REFERENCED_TABLE_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS', 'COLUMN_NAME' => 'REFERENCED_TABLE_NAME', 'ORDINAL_POSITION' => '11', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
		)
	);
	public $data;
}
?>