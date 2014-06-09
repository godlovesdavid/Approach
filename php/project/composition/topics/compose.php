<?php
require_once __DIR__.'/../layout.php';

global $RuntimePath;
global $DeployPath;
global $StaticFiles;

$StaticMarkupPath = $RuntimePath.'/support/templates/static/';
$TemplatePath = $RuntimePath.'/support/templates/';

foreach(Composition::$Active->Context['traversed'] as $node){ $DeployPath.= '/'.$node['alias'];}
$items = LoadObjects( 'compositions',array( 'method' => ' WHERE parent = '.Composition::$Active->Context['data']['id'] ));

$body->attributes['style']='background-color: #777 !important;';

$Screen->children[] = new renderable(['tag'=>'li','content'=>'You are here: '.Composition::$Active->Context['data']['title']]);

foreach($items as $item)
{
      $Label=new renderable(array('tag'=>'li','classes'=>array('Label')));
      $Label-> content = 
			'<h1 class="title" style="float:left;margin-bottom:11px;"><a href="'
             .'/'.$DeployPath.'/'.$item->data['alias']
             .'" style="display:inline-block; text-decoration: none;" class="round Button"> '
             .$item->data['title'].
            '</a></h1><br /><hr /><br />';
      $Screen -> children[] = $Label;
}

if(count($items) == 0) $Screen -> children[] = new renderable('li',['content' => 'No topics listed.']);

$Content -> children[] = new renderable('h2',['content'=>'Data from travsered Compositions']);
$Content -> children[] = new renderable('h5',['content'=>'(Used to find appropriate page data)']);
$Content -> children[] = new renderable('li', ['content'=>'<pre>'.var_export(Composition::$Active->Context['traversed'],true ).'</pre>']);

?>