<?php 
require_once(__DIR__.'/../../core.php');
class USER_PRIVILEGES extends Dataset
{
	public static $profile= array(
		'target' =>'USER_PRIVILEGES',
		'header'=>array( 
			'GRANTEE' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'USER_PRIVILEGES', 'COLUMN_NAME' => 'GRANTEE', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'TABLE_CATALOG' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'USER_PRIVILEGES', 'COLUMN_NAME' => 'TABLE_CATALOG', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'PRIVILEGE_TYPE' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'USER_PRIVILEGES', 'COLUMN_NAME' => 'PRIVILEGE_TYPE', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'IS_GRANTABLE' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'USER_PRIVILEGES', 'COLUMN_NAME' => 'IS_GRANTABLE', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
		)
	);
	public $data;
}
?>