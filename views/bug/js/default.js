$(function(){
    
    $.get('http://localhost:80/ProjectManager/project/ajaxGetProject', function(result){
        $('#ddProject').append(result);
    });
    
    $('#fCreateBug').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert(1);
         });
         return false;
    });   
});

function populateArea(projectName)
{    
    alert(projectName);
    var url = "http://localhost:80/ProjectManager/bug/ajaxGetArea/" + projectName;
    
    $.get(url, function(result){
        $('#ddArea').append(result);
    });
}

