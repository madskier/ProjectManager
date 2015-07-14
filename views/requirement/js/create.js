$(function(){
    
    getProject(null, null);
    
    $('#fCreateRequirement').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Requirement Successfully Created");
             document.location.href = "listReq";
         });
         return false;
    });
});


