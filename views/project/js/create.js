var gURL = globalURL;
$(function(){
    
    $('#fCreateProject').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             
             if (callback !== "" && callback !== null)
             {
                 alert(callback);
             }
             else
             {
                 alert("Project Created Successfully");
             }
             
             document.location.href = gURL + "project/listProject";
         });
         
         return false;
    });
});


