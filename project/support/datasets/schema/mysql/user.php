<?php 
require_once(__DIR__.'/../../core.php');
class user extends Dataset
{
	public static $profile= array(
		'target' =>'user',
		'Accessor'=>array( 'Primary' => 'User'),
		'header'=>array( 
			'Host' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Host', 'ORDINAL_POSITION' => '1', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'User' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'User', 'ORDINAL_POSITION' => '2', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'Password' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Password', 'ORDINAL_POSITION' => '3', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'char',),
			'Select_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Select_priv', 'ORDINAL_POSITION' => '4', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Insert_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Insert_priv', 'ORDINAL_POSITION' => '5', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Update_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Update_priv', 'ORDINAL_POSITION' => '6', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Delete_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Delete_priv', 'ORDINAL_POSITION' => '7', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Create_priv', 'ORDINAL_POSITION' => '8', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Drop_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Drop_priv', 'ORDINAL_POSITION' => '9', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Reload_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Reload_priv', 'ORDINAL_POSITION' => '10', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Shutdown_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Shutdown_priv', 'ORDINAL_POSITION' => '11', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Process_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Process_priv', 'ORDINAL_POSITION' => '12', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'File_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'File_priv', 'ORDINAL_POSITION' => '13', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Grant_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Grant_priv', 'ORDINAL_POSITION' => '14', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'References_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'References_priv', 'ORDINAL_POSITION' => '15', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Index_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Index_priv', 'ORDINAL_POSITION' => '16', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Alter_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Alter_priv', 'ORDINAL_POSITION' => '17', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Show_db_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Show_db_priv', 'ORDINAL_POSITION' => '18', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Super_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Super_priv', 'ORDINAL_POSITION' => '19', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_tmp_table_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Create_tmp_table_priv', 'ORDINAL_POSITION' => '20', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Lock_tables_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Lock_tables_priv', 'ORDINAL_POSITION' => '21', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Execute_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Execute_priv', 'ORDINAL_POSITION' => '22', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Repl_slave_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Repl_slave_priv', 'ORDINAL_POSITION' => '23', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Repl_client_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Repl_client_priv', 'ORDINAL_POSITION' => '24', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_view_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Create_view_priv', 'ORDINAL_POSITION' => '25', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Show_view_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Show_view_priv', 'ORDINAL_POSITION' => '26', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_routine_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Create_routine_priv', 'ORDINAL_POSITION' => '27', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Alter_routine_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Alter_routine_priv', 'ORDINAL_POSITION' => '28', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_user_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Create_user_priv', 'ORDINAL_POSITION' => '29', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Event_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Event_priv', 'ORDINAL_POSITION' => '30', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Trigger_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Trigger_priv', 'ORDINAL_POSITION' => '31', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'Create_tablespace_priv' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'Create_tablespace_priv', 'ORDINAL_POSITION' => '32', 'COLUMN_DEFAULT' => 'N', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'ssl_type' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'ssl_type', 'ORDINAL_POSITION' => '33', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'enum',),
			'ssl_cipher' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'ssl_cipher', 'ORDINAL_POSITION' => '34', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'blob',),
			'x509_issuer' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'x509_issuer', 'ORDINAL_POSITION' => '35', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'blob',),
			'x509_subject' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'x509_subject', 'ORDINAL_POSITION' => '36', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'blob',),
			'max_questions' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'max_questions', 'ORDINAL_POSITION' => '37', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'max_updates' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'max_updates', 'ORDINAL_POSITION' => '38', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'max_connections' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'max_connections', 'ORDINAL_POSITION' => '39', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'max_user_connections' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'max_user_connections', 'ORDINAL_POSITION' => '40', 'COLUMN_DEFAULT' => '0', 'IS_NULLABLE' => 'NO', 'DATA_TYPE' => 'int',),
			'plugin' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'plugin', 'ORDINAL_POSITION' => '41', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'char',),
			'authentication_string' => array(  'TABLE_CATALOG' => 'def', 'TABLE_SCHEMA' => 'mysql', 'TABLE_NAME' => 'user', 'COLUMN_NAME' => 'authentication_string', 'ORDINAL_POSITION' => '42', 'COLUMN_DEFAULT' => '', 'IS_NULLABLE' => 'YES', 'DATA_TYPE' => 'text',),
		)
	);
	public $data;
}
?>