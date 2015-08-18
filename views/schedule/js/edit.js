var gURL = globalURL;
$(function(){
    
    $('#fEditCycle').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
            alert("Cycle Successfully Edited"); 
            document.location.href = gURL + "schedule/listSchedule";
         });
         return false;
    });
});



