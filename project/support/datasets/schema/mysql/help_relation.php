<?php 
require_once(__DIR__.'/../../core.php');
class help_relation extends Dataset
{
	public static $profile= array(
		'target' =>'help_relation',
		'Accessor'=>array( 'Primary' => 'help_topic_id'),
		'header'=>array( 
			'help_topic_id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'help_relation', 'COLUMN_NAME' => 'help_topic_id', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'help_keyword_id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'help_relation', 'COLUMN_NAME' => 'help_keyword_id', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
		)
	);
	public $data;
}
?>