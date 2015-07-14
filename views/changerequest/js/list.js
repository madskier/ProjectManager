$(function(){
    
    getProject(null, '#ddProjectList');
    getStatus(null, '#ddStatusList');
    getEmployee(null, '#ddAssignedToList');
});

function getList()
{
    $('#tbCRList tr.main').remove();
    var project = $('#ddProjectList').val();
    var assignedTo = $('#ddAssignedToList').val();
    var status = $('#ddStatusList').val();  
    
    if (project === "")
    {
        project = 0;
    }
    
    if (assignedTo === "")
    {
        assignedTo = 0;
    }
    
    if (status === "")
    {
        status = 0;
    }
    
    var url = "http://localhost:80/ProjectManager/changerequest/ajaxGetList/" + project + "/" + assignedTo + "/" + status;
    
    $.getJSON(url, function(result)
    {       
        for (var i = 0; i < result.length; i++)
        {
            $('#tbCRList').append('<tr class="main"><td>' + result[i].id + '</td><td>' + result[i].name + '</td><td>' + result[i].status + '</td><td>' + result[i].assigned_to + '</td><td><a href="http://localhost:80/ProjectManager/changerequest/edit/'+ result[i].id +'">Edit</a></td><td><a href="http://localhost:80/ProjectManager/changerequest/view/'+ result[i].id +'">View Details</a></td><td><a class="btnDel" rel="'+ result[i].id +'" href="#">Delete</a>'+'</td></tr>');
        }  
        
        $('.btnDel').click(function(){
            var id = $(this).attr('rel');
            var ok = confirm('Are you sure you want to delete CR #' + id);
            
            if (ok)
            {
               deleteCR(id);
            }
            
            return false;
        });
    });   
}

function deleteCR(id)
{
    var url = "http://localhost:80/ProjectManager/changerequest/ajaxDelete/" + id;
    $.get(url, function()
    {
        alert('CR Successfully Deleted');
        getList();
    });
}


