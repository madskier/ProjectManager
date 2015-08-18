var gURL = globalURL;
$(function(){
    
    getProject(null, null);
    getPlatform(null);
    getEmployee(null, null);
    
    $('#fCreateBug').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
                          
            alert("Bug Successfully Created");
            document.location.href = gURL + "bug/listBug";           
             
         });
         return false;
    });
});