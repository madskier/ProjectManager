var gURL = globalURL;
$(function(){
    
    getProject(null, null);    
    getEmployee(null, null);
    getStatus(null, null);
    
    $('#fCreateTC').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Test Case Successfully Created");
             document.location.href = gURL + "testcase/listTC";
         });
         return false;
    });
});


