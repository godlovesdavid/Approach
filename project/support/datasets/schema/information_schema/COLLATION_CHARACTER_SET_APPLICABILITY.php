<?php 
require_once(__DIR__.'/../../core.php');
class COLLATION_CHARACTER_SET_APPLICABILITY extends Dataset
{
	public static $profile= array(
		'target' =>'COLLATION_CHARACTER_SET_APPLICABILITY',
		'header'=>array( 
			'COLLATION_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'COLLATION_CHARACTER_SET_APPLICABILITY', 'COLUMN_NAME' => 'COLLATION_NAME', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
			'CHARACTER_SET_NAME' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'information_schema', 'TABLE_NAME' => 'COLLATION_CHARACTER_SET_APPLICABILITY', 'COLUMN_NAME' => 'CHARACTER_SET_NAME', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'varchar',),
		)
	);
	public $data;
}
?>