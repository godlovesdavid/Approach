<?php 
require_once(__DIR__.'/../../core.php');
class microdoc extends Dataset
{
	public static $profile= array(
		'target' =>'microdoc',
		'Accessor'=>array( 
			'Primary' => 'id',
			'Reference'=>array(  array('development','types','id'), array('development','compositions','id'), array('development','operator','id'),)),
		'header'=>array( 
			'id' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'id', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'type' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'type', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '258', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'where' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'where', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '1', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'owner' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'owner', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => '1', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'trendocity' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'trendocity', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'views' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'views', 'ORDINAL_POSITION' => '6', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'partner_rating' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'partner_rating', 'ORDINAL_POSITION' => '7', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'user_rating' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'user_rating', 'ORDINAL_POSITION' => '8', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'bigint',),
			'title' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'title', 'ORDINAL_POSITION' => '9', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'tags' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'tags', 'ORDINAL_POSITION' => '10', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'poster' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'poster', 'ORDINAL_POSITION' => '11', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'thumb' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'thumb', 'ORDINAL_POSITION' => '12', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'blurb' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'blurb', 'ORDINAL_POSITION' => '13', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'conclusion' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'conclusion', 'ORDINAL_POSITION' => '14', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'videos' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'videos', 'ORDINAL_POSITION' => '15', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'images' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'images', 'ORDINAL_POSITION' => '16', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'varchar',),
			'description' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'description', 'ORDINAL_POSITION' => '17', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'mediumtext',),
			'links' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'links', 'ORDINAL_POSITION' => '18', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'text',),
			'credits' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'development', 'TABLE_NAME' => 'microdoc', 'COLUMN_NAME' => 'credits', 'ORDINAL_POSITION' => '19', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'text',),
		)
	);
	public $data;
}
?>