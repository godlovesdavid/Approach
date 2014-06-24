<?php
require_once __DIR__.'/layout.php';

global $RuntimePath;
global $DeployPath;
global $StaticFiles;

$StaticMarkupPath = $RuntimePath.'/support/templates/static/';
$TemplatePath = $RuntimePath.'/support/templates/';

$options['template']=$TemplatePath.'Message.xml';
$options['Message']['messages'] = ['method' =>'WHERE `id` <=' . 3];
$options['Message']['users'] = ['condition' => 'LIMIT 0'];


$OrganUpdates = new renderable(['tag'=>'li','pageID'=>'OrgUpdates']);
$OrganUpdates->content = '<h2>No new updates detected for <em>Approach Corporation</em></h2>
<h3>Welcome to the developer dashboard! <br />
This area is currently under initial development.</h3>';

$Screen -> children[] = $OrganUpdates;
$Screen -> children[] = new Smart($options);
$Screen -> children[] = $ApproachDebugConsole;

$Content -> children[] = new renderable(['tag'=>'li','pageID'=>'HomePageFeatures','template'=>$StaticMarkupPath.'frontpage-row.html']);
$Content -> children[] = new renderable('div');
$Content -> content = '<pre>'.var_export(Composition::$Active->Context,true).'</pre>';


$Content -> children[] = new Smart($options);

/***/

?>