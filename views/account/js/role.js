var gURL = globalURL;
$(function(){
    getCurrentRole();
    getRoles();
   $('#fRequestRole').submit(function() {
        
            var url = $(this).attr('action');
            var data = $(this).serialize();

            $.post(url, data, function(callback){
                if (callback !== "" && callback !== null)
                {
                    alert(callback);
                }
                else
                {
                    alert("Role Requested");                
                }
                
                document.location.href = gURL + "dashboard/index";
            });
            return false;
            
    }); 
});

function getCurrentRole()
{
    var url = gURL + "account/ajaxGetCurrentRole/";
    
    $.getJSON(url, function(result)
    {      
        $('#txtCurrent').val(result);        
    });
}

function getRoles()
{
    var url = gURL + 'account/ajaxGetRoles';
    $.get(url, function(result){
        $('#ddNewRole').find('option').remove().end().append('<option value="">Select a Role</option>');
        $('#ddNewRole').append(result);                 
    });
}


