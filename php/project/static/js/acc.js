/*************************************************************************

	APPROACH
	Organic, human driven software.


	COPYRIGHT NOTICE
	__________________

	Copyright 2002-2013, 2014 - Approach Foundation LLC, Garet Claborn
	All Rights Reserved.

	Title: ACC (Approach Command Client/Console), a system of accessing systems.

	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at

	apache.org/licenses/LICENSE-2.0

	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License.

*/

var baseAppURL='nicegamez.com';
function slidesLoadedHandler(list)
{
	var activeElement = $(list).find('.active')[0];
	
	if(list.requester == 'Next' && $(list).children().last()[0] != $(activeElement)[0]) //&&   check extreme
	{
		$(activeElement).removeClass('active');
		activeElement = $(activeElement).next();
		$(activeElement)[0].className+=' active';
	}
	if(list.requester=='Back' && $(list).children().first()[0] != $(activeElement)[0]) //&& check extreme
	{
		 $(activeElement).removeClass('active');
		 activeElement = $(activeElement).prev();
		 $(activeElement)[0].className+=' active';
	}
}
function profile(target,RunOnce)
{
  attrs = $(target)[0].attributes;
  var IntentJSON = {};
  IntentJSON['support'] = {};
  IntentJSON.support.target={};
  for(var i=0;i<attrs.length;i++)
  {
	IntentJSON.support.target[attrs[i].nodeName]= attrs[i].value;
  }
  IntentJSON.support.target.tag = $(target).prop("tagName").toLowerCase();
  if(typeof(RunOnce)==='undefined')  IntentJSON.support.target.parent = profile(target.parentNode, true);
  return IntentJSON.support.target;
}

  function classSplit(incoming){return incoming.className.split(/\s+/);}
  function debug(reason, loggable){ console.log(reason);    console.log(loggable);  }
  function dragger(){   $(this).bind('mousedown',function(event){});    };

  var topChange=0, fullscreenModeActive = false, controlsHidden = false, html5=false,ApproachTotalRequestsAJAX=0
  hideControls= false,AnimatingControls = false, ob2 =null;
  ActiveTimeStream=0, ActiveFadePhase=0, FadeTimer=1, projectorClass='up';


var Interface=function()
{
    $elf=this;
    $elf.Collapse = true;
    $elf.active= true;
    $elf.Instance=0;
    $elf.InputArea= {};
    $elf.StagingArea= {};
    $elf.DisplayArea= {};
    $elf.Reflection='https://service-dev.approach.im/Reflect.php';
    $elf.Utility='https://service-dev.approach.im/Utility.php';
    
	$elf.Buttons={ revert:[] };
	$elf.Focus= {};
	$elf.Controls= {};
	$elf.Active =
	{
		Menu:{},
		MenuID: 'nullMenu',
		MenuDown:false,
		Field:{},
		User:{},
		Task:{},
		SyncList:{}
	};

	$elf.call=
	{
		init:function(Markup)
		{
			$elf.Interface = Markup;
			$(Markup).find('.controls').on('click mouseenter mouseleave', function(event){ $elf.call.events(event); });
			$elf.Controls = $(Markup).find('.controls')[0];
		
			$(Markup).draggable();        
			$($elf.Controls).find('li').each(function(i,obj)  //binding control buttons to .control li's
			{
				var classes = classSplit(obj);
				$.each(classes, function(i,_class)
				{
					switch(_class)
					{
						/*  ACC Functions      */
						case 'upload':        $elf.Buttons.upload.push(obj);          break;
						case 'mediabrowse':   $elf.Buttons.mediabrowse.push(obj);     break;
						case 'blocktext':     $elf.Buttons.blocktext.push(obj);       break;
						//case 'linetext':      $elf.Buttons.linetext.push(obj);        break;
		
						case 'dashboard':     $elf.Buttons.trackable.push(obj);       break;      //This means they can add the component, renderable or smart object to their personal dashboard. They can also organize their dashboard.   The dashboard is a FILE in a USER DIRECTORY o_O; other files should be there as we go. like message logs.
						//case 'preview':       $elf.Buttons.push(obj);                 break;
						case 'save':          $elf.Buttons.push(obj);                 break;
						case 'sort':          $elf.Buttons.sort.push(obj);            break;      //Multipurpose Sort for something like Hurry Curry sorter ........... >_>;    Arrange by 'property' or other things.. Function overloadable.
						case 'revert':        $elf.Buttons.revert.push(obj);          break;      //Go back to database version of the edited stuff (Big Undo / Refetch the objects)
						
						/*  Window Base Functions       */
						case 'nestedcontrol': $elf.Buttons.nestedcontrols.push(obj);  break;
						case 'dragger':       $elf.Buttons.dragger.push(obj);         break;
						
						/*    Wizard Control Functions    */
						case 'cancel':        $elf.Buttons.cancel.push(obj);          break;
						case 'next':          $elf.Buttons.next.push(obj);            break;
						case 'back':          $elf.Buttons.back.push(obj);            break;
						case 'finish':        $elf.Buttons.finish.push(obj);          break;
						
						default: break;
					}
				});
			});
			return $elf;
		},
		Ajax:function(json,status,xhr)
		{
		  if (typeof json != 'string')
		  $.each(json, function(Activity, IntentJSON)
		  {
			console.log('Detecting AJAX Callback...');
			switch(Activity)
			{
				case 'APPEND': $elf.call.Append(IntentJSON); break;
				case 'REFRESH': $elf.call.Refresh(IntentJSON); break;
				case 'REMOVE': $elf.call.Remove(IntentJSON); break;
				case 'TRIGGER': $elf.call.Trigger(IntentJSON); break;
		
				default: break;
			}
		  });
		  else{ console.log('Unhandled Response Code',json); $elf.call.Append({'#terminal':json}); }
		},
		Append: function(Info)
		{
		  console.log('Appending AJAX Callback to Page Element...');
		  console.log(Info);
		  console.log('');
		  $.each(Info, function(Selector, Markup)
		  {
			var DynamicElement=$(Markup).appendTo(Selector);
			$(Selector)[0].scrollTop = $(Selector)[0].scrollHeight;   //Scroll to bottom. Improve by, scroll to appended element
		
		/*        var classes = classSplit(DynamicElement[0]);
			$.each(classes, function(i,_class)
			{
			  if(_class == 'Interface')
			  {
				  DynamicElement.Interface = new Interface();
				  DynamicElement.Interface.call.init(DynamicElement);
		
				  $.ActiveInterface=DynamicElement.Interface;
				  DynamicElement.Interface.active = true;
				  DynamicElement.find('.controls').bind('click mouseenter mouseleave', function(event){ InterfaceEvents(event); });
			  }
			});
		*/
		  });
		},
		Refresh: function(Info)
		{
		  $.each(Info, function(Selector, Markup)
		  {
			var DynamicElement=$(Selector).replaceWith(Markup);
		//            $(Selector)[0].scrollTop = $(Selector)[0].scrollHeight;   //Scroll to bottom. Improve by, scroll to appended element
		
			//Bind Events for Dynamic Elements if they support Interface
			var classes = classSplit(DynamicElement[0]);
			$.each(classes, function(i,_class)
			{
			  if(_class == 'Interface')
			  {
				  DynamicElement.Interface = new Interface();
				  DynamicElement.Interface.call.init(DynamicElement);
		
				  $.ActiveInterface=DynamicElement.Interface;
				  DynamicElement.Interface.active = true;
				  DynamicElement.find('.controls').bind('click mouseenter mouseleave', function(event){ InterfaceEvents(event); });
			  }
			});
		  });
		},
		Service:function(target, IntentJSON)
		{
			  var RequestType = '';
			  var RequestNoun = '';
			  var RequestVerb = '';
		
				for(var key in IntentJSON.command)
				{
					RequestType = key;
					for(var k in IntentJSON[key])
					{
						RequestNoun = k;
						RequestVerb = IntentJSON[key][k];
					}
				}
				console.log(IntentJSON.command);    //if (RequestNoun == 'Instance') console.log('Instance');
				if(RequestNoun == 'Autoform')
				{
					$($.ActiveInterface.Interface).find('.Content').find('form').each(function(i,obj)
					{
						// attach any data for ajax calls after verb
						IntentJSON.command[RequestType][RequestNoun][RequestVerb][obj['action']]={};  //action is the web service
						$(obj).find('input, textarea, select, checkbox,radio').each(function(i2,input)
						{   //get all form values
							IntentJSON.command[RequestType][RequestNoun][RequestVerb][obj['action']][$(input).attr('name')]=$(input).val();
						});
						// ability to bind submission with a type in the types collection (default implementation only)
						IntentJSON.command[RequestType][RequestNoun][RequestVerb][obj['action']]['type']=1;
					});
				}
		
			  IntentJSON.support.target = profile(target);
			  console.log('Support: ',IntentJSON.support.target);
			  console.log('Command: ',IntentJSON.command);
		
			  var ReqData ={json: JSON.stringify(IntentJSON)};    //Switch to JSON3 ?
		
			  ApproachTotalRequestsAJAX++;
		
			$.ajax({
				url: $elf.Utility,
				type: "post",
				data: ReqData,
				dataType: 'json',
				success: $elf.call.Ajax
			});
		
		},
		events:function(e)
		{
			var classlist = e.target.className.split(/\s+/), c=0, L=0;
			var role = $(e.target).data('role');
			
			if(e.type == 'click')
			{
				CurrentControl=$(e.target).closest('.controls')[0];
				if ($(CurrentControl).data('role')=='editable')
				{
					e.target=CurrentControl;
					role='editable';
				}
			
				var RequestType = '';
				var RequestNoun = '';
				var RequestVerb = '';
			
				var IntentJSON = {};
				IntentJSON.support = {};
				IntentJSON.command = $(e.target).data('intent');
			
			
				if($elf.Active.MenuDown && role != 'MenuButton' && role != 'MenuSeparator')
				{
					$elf.call.menu.drop();
					$elf.Active.MenuDown = false;
				}
				switch(role)
				{
					case 'closer' :         $elf.call.close(); break;
					case 'collapse':        $elf.call.collapse(); break;
					case 'editable':        $elf.call.edit(e.target); break;
					
					case 'MenuLabel':       CurrentMenu=$(e.target).html();
											if($elf.Active.MenuID == CurrentMenu)
											{
												$elf.Active.MenuDown = false;
												$elf.Active.MenuID = 'nullMenu';
												break;
											}
											$elf.Active.MenuID = CurrentMenu;
											$elf.Active.Menu =  $(e.target).parent().find('.DropMenu');
											$elf.call.menu.drop();
											$elf.Active.MenuDown = true;
											break;
		
					case 'Finish':          $elf.call.Service(e.target, IntentJSON); break;
					case 'MenuButton':      $elf.call.Service(e.target, IntentJSON); break;
		
					case 'Next':            var list=$elf.Interface.find('.Slide')[0].parentNode;
											list.requester='Next';
											$elf.call.slidesLoadedHandler(list);
											break;
					case 'Back':            var list=$elf.Interface.find('.Slide')[0].parentNode;
											list.requester='Back';
											$elf.call.slidesLoadedHandler(list);
											break;
					default:				break;
				}
			}
		},
		menu:
		{
		  drop:function()
		  {
			  $($elf.Active.Menu).slideToggle(400);
		  }
		},
		fade:function()
		{
		   FadeTimer +=250;
		   if(FadeTimer%60001 == 0)
		   {
			   $elf.AnimatingControls = true;
			   $($.ActiveInterface.Controls).fadeTo(1600,0, function(){$elf.AnimatingControls=false;$elf.controlsHidden=true;} );
		   }
		},
		/*
		get:function(var what, var compliment)
		{
			switch(what)
			{
				case 'extern' : $elf.ActiveObject = 'waiting';
									$elf.call.Service('Connect', compliment);
									console.log('Connecting to service provider for complimentary object');
									setInterval($elf.call.Sync,750);    //The return value $elf.ActiveObject will be here - consider making it an array of objects (threadsafer direction)
									break;
			}
		},
		*/
		sort: function()
		{
				this.Sortables = GetSortables($elf.Current.InputRegion);
				this.Sorted = {};
		
				for(Sortable in this.Sortables){    $elf.Sequencer(Sortable);  }
		
				while($elf.Sorting)
				{
					this.Sorted[$elf.Sequencer.ActiveSort]=$elf.Sequencer();
				}
		},
		collapse: function()
		{
		  if($elf.Collapse==true)
		  {
			$elf.RestoreHeight = $('.Interface')[0].style.height;
			$('.Interface')[0].style.height='26px';
			$('.Interface .InterfaceLayout .Header .AppMenu')[0].style.display='none';
			$('.Interface .InterfaceLayout .Content')[0].style.display='none';
			$('.Interface .InterfaceLayout .Footer')[0].style.display='none';
			$elf.Collapse = false;
		
		  }
		  else
		  {
			$('.Interface')[0].style.height=$elf.RestoreHeight;
			$('.Interface .InterfaceLayout .Header .AppMenu')[0].style.display='inline-block';
			$('.Interface .InterfaceLayout .Content')[0].style.display='block';
			$('.Interface .InterfaceLayout .Footer')[0].style.display='block';
			$elf.Collapse = true;
		  }
		
		},
		close: function()
		{
		  $($elf.Interface).remove();
		},
		save: function()
		{
		
		},
		slidesLoadedHandler: function(list)
		{
			//Really useful slider, this one function, "slidesLoadedHandler", can be bsd license (newest version as of 2012)
			var activeElement = $(list).find('.active')[0];
		
			if(list.requester == 'Next' && $(list).children().last()[0] != $(activeElement)[0]) //&&   check extreme
			{
				$(activeElement).removeClass('active');
				activeElement = $(activeElement).next();
				$(activeElement)[0].className+=' active';
			}
			if(list.requester=='Back' && $(list).children().first()[0] != $(activeElement)[0]) //&& check extreme
			{
				 $(activeElement).removeClass('active');
				 activeElement = $(activeElement).prev();
				 $(activeElement)[0].className+=' active';
		
			}
		},
		edit: function(target)
		{
			selfID=$(target).data('self');
			console.log('editing: '+selfID);
			ApproachTotalRequestsAJAX++;
			console.log(target.parentNode);
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: 'https://service.'+baseAppURL+'/Utility.php?instancename='+$(target).data('component')+'&instancenum='+(0)+'&child='+selfID,
				data:
				{
					'json': '{ "request":{"SERVE":{"PageID":"'+$(target).parent().attr('id')+'", "Child":"'+$(target).attr('id')+'", "ChildRef":"'+selfID+'"}}}'
				},
				success:function(json, status, xhr)
				{
					// successful request; do something with the data
					$('#ApproachDebugConsole').append(json);
					//$elf.call.Append({'#ApproachDebugConsole',json});
					$.each(json.refresh, function(i,obj)
					{
						var ApproachUnit = $('#Dynamics #Notifier');
						$('#'+i).html(obj);
					});
				}
            });
		},
		preview: function()
		{
			ApproachTotalRequestsAJAX++;
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '//'+baseAppURL+'/acc/console.php?publish='+this.get(0).COMPOSITION+'&instancename='+this.get(0).FeatureName+'&instancenum='+(this.get(0).FeatureIndex)+'&child='+this.get(0).ChildRef,
				data:
				{
				  'json': '{ "request":{"PREVIEW":{"tokens":{'+ApproachUpdateTokens+'},"PageID":"'+this.get(0).FeaturePageID+'", "Child":"'+this.get(0).ChildPageID+'", "ChildRef":"'+this.get(0).ChildRef+'"}}}'
				},
				success:function(json, status, xhr)
                {
					// successful request; do something with the data
					$('#ApproachControlUnit').empty();
					$.each(json.refresh, function(i,obj)
                    {
						var ApproachUnit = $('#Dynamics #Notifier');
						$('#'+i).html(obj);
					});
				},
				error:function(e,xhr,settings,exception){	alert('error in:\\n'+settings.url+'error:\\n'+xhr.responseText);	}
            });
		},
		next: function() {alert('checking next button ');},
		revert: function()
		{
		   ApproachTotalRequestsAJAX++;
		   $.ajax({
			type: 'POST',
			dataType: 'json',
			url: '//'+baseAppURL+'/acc/console.php?publish='+this.get(0).publication+'&instancename='+this.get(0).FeatureName+'&instancenum='+(this.get(0).FeatureIndex)+'&child='+this.get(0).ChildRef,
			data:
			{
			  'json': '{ "request":{"UPDATE":{"tokens":{'+ApproachUpdateTokens+'},"PageID":"'+this.get(0).FeaturePageID+'", "Child":"'+this.get(0).ChildPageID+'", "ChildRef":"'+this.get(0).ChildRef+'"}}}'
			},
			success:function(json, status, xhr){
			  // successful request; do something with the data
			  $('#ApproachControlUnit').empty();
			  $.each(json.refresh, function(i,obj){
					var ApproachUnit = $('#Dynamics #Notifier');
					$('#'+i).html(obj);
			  });
			},
			error:function(e,xhr,settings,exception){alert('error in:\\n'+settings.url+'error:\\n'+xhr.responseText);}
		  });
		}
	};
	//end $elf.call
	return $elf;
};

$(document).ready( function()
{
	$('.Interface').each(function(instance, Markup)
	{
		Markup.Interface=new Interface().call.init(Markup);
	});
} );

