<?php 
require_once(__DIR__.'/../../core.php');
class REFERENTIAL_CONSTRAINTS_COLUMN_USAGE extends Dataset
{
	public static $profile= array(
		'target' =>'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE',
		'header'=>array( 
			'CONSTRAINT_CATALOG' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'CONSTRAINT_CATALOG', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'CONSTRAINT_SCHEMA' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'CONSTRAINT_SCHEMA', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'CONSTRAINT_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'CONSTRAINT_NAME', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'TABLE_CATALOG' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'TABLE_CATALOG', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'TABLE_SCHEMA' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'TABLE_SCHEMA', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'TABLE_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'TABLE_NAME', 'ORDINAL_POSITION' => '6', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'COLUMN_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'COLUMN_NAME', 'ORDINAL_POSITION' => '7', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'ORDINAL_POSITION' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'ORDINAL_POSITION', 'ORDINAL_POSITION' => '8', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'UNIQUE_CONSTRAINT_CATALOG' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'UNIQUE_CONSTRAINT_CATALOG', 'ORDINAL_POSITION' => '9', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UNIQUE_CONSTRAINT_SCHEMA' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'UNIQUE_CONSTRAINT_SCHEMA', 'ORDINAL_POSITION' => '10', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UNIQUE_CONSTRAINT_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'UNIQUE_CONSTRAINT_NAME', 'ORDINAL_POSITION' => '11', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UNIQUE_TABLE_CATALOG' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'UNIQUE_TABLE_CATALOG', 'ORDINAL_POSITION' => '12', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UNIQUE_TABLE_SCHEMA' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'UNIQUE_TABLE_SCHEMA', 'ORDINAL_POSITION' => '13', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UNIQUE_TABLE_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'UNIQUE_TABLE_NAME', 'ORDINAL_POSITION' => '14', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'UNIQUE_COLUMN_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'REFERENTIAL_CONSTRAINTS_COLUMN_USAGE', 'COLUMN_NAME' => 'UNIQUE_COLUMN_NAME', 'ORDINAL_POSITION' => '15', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
		)
	);
	public $data;
}
?>