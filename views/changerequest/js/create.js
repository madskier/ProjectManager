var gURL = globalURL;
$(function(){
    hideDetail();
    getProject(null, null);    
    getEmployee(null, null);
    getInformant(null, null);
    $('#fCreateCR').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             
             if (callback !== "" && callback !== null)
             {
                 alert(callback);
             }
             else
             {
                 alert("Change Request Created Successfully");
             }
             
             document.location.href = gURL + "changerequest/listCR";
         });
         
         return false;
    });
});

function showDetail()
{
    $('#tbDetail').show();
    $('#btnShowDetail').hide();
    $('#btnSubmit').hide();
}

function hideDetail()
{
    $('#tbDetail').hide();
    $('#btnShowDetail').show();
    $('#btnSubmit').show();
}

