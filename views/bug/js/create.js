$(function(){
    
    getProject(null);
    getPlatform(null);
    getEmployee(null);
    
    $('#fCreateBug').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Bug Successfully Created");
             document.location.href = "listBug";
         });
         return false;
    });
});