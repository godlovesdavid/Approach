<?php 
require_once(__DIR__.'/../../core.php');
class proc extends Dataset
{
	public static $profile= array(
		'target' =>'proc',
		'Accessor'=>array( 'Primary' => 'type'),
		'header'=>array( 
			'db' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'db', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'name' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'name', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'type' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'type', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'specific_name' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'specific_name', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'language' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'language', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => 'SQL', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'sql_data_access' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'sql_data_access', 'ORDINAL_POSITION' => '6', 'COLUMN_DEFAULT' => 'CONTAINS_SQL', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'is_deterministic' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'is_deterministic', 'ORDINAL_POSITION' => '7', 'COLUMN_DEFAULT' => 'NO', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'security_type' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'security_type', 'ORDINAL_POSITION' => '8', 'COLUMN_DEFAULT' => 'DEFINER', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'param_list' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'param_list', 'ORDINAL_POSITION' => '9', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'blob',),
			'returns' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'returns', 'ORDINAL_POSITION' => '10', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'longblob',),
			'body' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'body', 'ORDINAL_POSITION' => '11', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'longblob',),
			'definer' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'definer', 'ORDINAL_POSITION' => '12', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'created' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'created', 'ORDINAL_POSITION' => '13', 'COLUMN_DEFAULT' => 'CURRENT_TIMESTAMP', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'timestamp',),
			'modified' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'modified', 'ORDINAL_POSITION' => '14', 'COLUMN_DEFAULT' => '0000-00-00 00:00:00', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'timestamp',),
			'sql_mode' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'sql_mode', 'ORDINAL_POSITION' => '15', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'set',),
			'comment' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'comment', 'ORDINAL_POSITION' => '16', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'text',),
			'character_set_client' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'character_set_client', 'ORDINAL_POSITION' => '17', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'char',),
			'collation_connection' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'collation_connection', 'ORDINAL_POSITION' => '18', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'char',),
			'db_collation' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'db_collation', 'ORDINAL_POSITION' => '19', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'char',),
			'body_utf8' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'proc', 'COLUMN_NAME' => 'body_utf8', 'ORDINAL_POSITION' => '20', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'longblob',),
		)
	);
	public $data;
}
?>