<?php 
require_once(__DIR__.'/../../core.php');
class plugin extends Dataset
{
	public static $profile= array(
		'target' =>'plugin',
		'Accessor'=>array( 'Primary' => 'name'),
		'header'=>array( 
			'name' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'plugin', 'COLUMN_NAME' => 'name', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'dl' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'plugin', 'COLUMN_NAME' => 'dl', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
		)
	);
	public $data;
}
?>