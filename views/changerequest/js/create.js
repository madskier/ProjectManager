$(function(){
    
    getProject(null, null);    
    getEmployee(null, null);
    
    $('#fCreateCR').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Change Request Successfully Created");
             document.location.href = "http://localhost:80/ProjectManager/changerequest/listCR";
         });
         return false;
    });
});

