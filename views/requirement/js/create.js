$(function(){
    
    getProject(null, null);
    
    $('#fCreateRequirement').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Requirement Successfully Created");
             document.location.href = "http://localhost:80/ProjectManager/requirement/listReq";
         });
         return false;
    });
});


