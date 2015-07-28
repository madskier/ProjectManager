$(function(){
    
    getProject(null, null);
    getPlatform(null);
    getEmployee(null, null);
    
    $('#fCreateBug').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Bug Successfully Created");
             document.location.href = "http://localhost:80/ProjectManager/bug/listBug";
         });
         return false;
    });
});