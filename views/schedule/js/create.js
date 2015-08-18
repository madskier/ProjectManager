var gURL = globalURL;
$(function(){
    getList();
    $('#fCreateCycle').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
            alert("Cycle Created Successfully"); 
            document.location.href = gURL + "schedule/listSchedule";
         });
         return false;
    });
});


