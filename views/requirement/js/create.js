var gURL = globalURL;
$(function(){
    
    getProject(null, null);
    getStatus(null, null);
    $('#fCreateRequirement').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Requirement Successfully Created");
             document.location.href = gURL + "requirement/listReq";
         });
         return false;
    });
});


