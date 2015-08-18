var gURL = globalURL;
$(function(){
    
    getProject(null, '#ddSearchProject');    
    
    $('#fEditProject').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Project Successfully Edited");
             document.location.href = gURL + "project/listProject";
         });
         return false;
    });
});



