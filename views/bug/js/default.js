$(function(){
    
    $.get('bug/ajaxGetList');
    $('#tbBugList');
    
    $('#fCreateBug').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert(1);
         });
         return false;
    });
});

