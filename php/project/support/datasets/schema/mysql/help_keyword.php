<?php 
require_once(__DIR__.'/../../core.php');
class help_keyword extends Dataset
{
	public static $profile= array(
		'target' =>'help_keyword',
		'Accessor'=>array( 
			'Primary' => 'help_keyword_id',
			'Reference'=>array(  array('','',''),)),
		'header'=>array( 
			'help_keyword_id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'help_keyword', 'COLUMN_NAME' => 'help_keyword_id', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'name' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'help_keyword', 'COLUMN_NAME' => 'name', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
		)
	);
	public $data;
}
?>