/*
	 Erwartet die Struktur
	 <div>
	 <div class="post">
	 <div class="title"> TITEL
	 </div>
	 </div>
	 <div class="actions" >
	 <span class="remove" >R</span>
	 <span class="move-up">^</span>
	 <span class="move-down">v</span>
	 </div>
	 </div>


*/

function multi_remove(element){

	var element = $(element).parent().parent();
	var parent = element.parent();
	var next = element.next();
    var prev = element.prev();
	element.remove();

	/*$(parent).find(".list").children().each(function( index ) {
			multi_register_action($(this));      
			});*/ 
	filter_actions(prev);
	filter_actions(next);
//	filter_actions(parent);
	$(parent).parent().parent().parent().find('.add-button').first().show();
}
function multi_moveUp(element){
	var current = $(element).parent().parent();
	var prev = current.prev()
		if(prev.length == 0){
			return;
		}
	current.insertBefore(prev);
	filter_actions(prev);
	filter_actions(current);
}

function multi_moveDown(element){
	var current = $(element).parent().parent();
	var next = current.next();
	if(next.length == 0){
		return;
	}
	current.insertAfter(next);
	filter_actions(next);
	filter_actions(current);
}

function filter_actions(parent){
	var actions = parent.find('.actions');
	if($(parent).is(':first-child')){
		$(actions).find('.move-up').hide();
	}else{
		$(actions).find('.move-up').show();
	}
	if($(parent).is(':last-child')){
		$(actions).find('.move-down').hide();
	}else{
		$(actions).find('.move-down').show();
	}
}

function multi_register_action(element){
	element.find('.remove').on('click',function() {
			multi_remove(this)
			});
	element.find('.move-up').on('click',function() {
			multi_moveUp(this)
			});
	element.find('.move-down').on('click',function() {
			multi_moveDown(this)
			});
	filter_actions(element);
}
function register_events(element){
	    register_date_event($(this));
}
function register_date_event(element){
	$('.date').kvDatepicker();

}
/*elementList is a list of jquery objects */
function button_to_register(elementList){
	elementList.each(function( index ) {
		//console.log($(this).attr("id"));
		//console.log($(this).closest(".block-template"));
		if($(this).closest(".block-template").length > 0){
			return;
		}
		//console.log("Registering " + $(this).data("id") + " for " + $(this).data("class"));

		// var current = $(this); 
		//$(document).on("dblclick", $(this).data("id"), function(e) {
		$(this).on('click', function () {
			//console.log('click on ' + $(this).data("class"));

			// get the number of same properties we already have

			var siblinglist = $(this).data("class") + "-list";
			var nSiblings = $("#" + siblinglist).length;

			// return if max number of siblings reached
			if ( nSiblings >= $(this).data("max") ) {
				return;
			}

			var blockname = $(this).data("parent") + "-new-" + $(this).data("class") +  "-block";

			var html = $("#" + blockname).clone().html();		
			html = html.replace(/__id__/g, 'new' + nSiblings);

			
			
			$("#" + siblinglist).append($(html));
			
			// button_to_register($(html).find('.button_to_register'));
			button_to_register($('.button_to_register'));
			multi_register_action($(html));
			register_events($(html));
	/*		var datefields = $(html).find('.date');
			datefields.each(function(){
				$(this).kvDatepicker();
			});
		*/	
			//multi_register_action(html);
			//$("#" + siblinglist).append(html);

			// update length of sibling list
			nSiblings = $(siblinglist).length;
			if ( nSiblings >= $(this).data("max") ) {
				$(this).hide();
			}

			$("#" + siblinglist).children().each(function( index ) {
					filter_actions($(this));
			});

			});

			$(this).removeClass("button_to_register");
	});
	}
