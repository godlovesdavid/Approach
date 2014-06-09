<?php 
require_once(__DIR__.'/../../core.php');
class db extends Dataset
{
	public static $profile= array(
		'target' =>'db',
		'Accessor'=>array( 'Primary' => 'User'),
		'header'=>array( 
			'Host' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Host', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'Db' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Db', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'User' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'User', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'Select_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Select_priv', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Insert_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Insert_priv', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Update_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Update_priv', 'ORDINAL_POSITION' => '6', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Delete_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Delete_priv', 'ORDINAL_POSITION' => '7', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Create_priv', 'ORDINAL_POSITION' => '8', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Drop_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Drop_priv', 'ORDINAL_POSITION' => '9', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Grant_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Grant_priv', 'ORDINAL_POSITION' => '10', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'References_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'References_priv', 'ORDINAL_POSITION' => '11', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Index_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Index_priv', 'ORDINAL_POSITION' => '12', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Alter_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Alter_priv', 'ORDINAL_POSITION' => '13', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_tmp_table_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Create_tmp_table_priv', 'ORDINAL_POSITION' => '14', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Lock_tables_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Lock_tables_priv', 'ORDINAL_POSITION' => '15', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_view_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Create_view_priv', 'ORDINAL_POSITION' => '16', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Show_view_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Show_view_priv', 'ORDINAL_POSITION' => '17', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_routine_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Create_routine_priv', 'ORDINAL_POSITION' => '18', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Alter_routine_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Alter_routine_priv', 'ORDINAL_POSITION' => '19', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Execute_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Execute_priv', 'ORDINAL_POSITION' => '20', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Event_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Event_priv', 'ORDINAL_POSITION' => '21', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Trigger_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'db', 'COLUMN_NAME' => 'Trigger_priv', 'ORDINAL_POSITION' => '22', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
		)
	);
	public $data;
}
?>