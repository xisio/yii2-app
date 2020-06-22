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
              element.remove();

              $(parent).find(".list").children().each(function( index ) {
                        multi_register_action($(this));      
              }); 
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
