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
            $('#tbCRList').append('<tr class="main"><td class="firstCol">' + result[i].id + '</td><td>' + result[i].name + '</td><td>' + result[i].status + '</td><td>' + result[i].assigned_to + '</td><td class="tdIcon"><a href="http://localhost:80/ProjectManager/changerequest/edit/'+ result[i].id +'"><img class="editIcon" src="http://localhost:80/ProjectManager/images/editIcon.png" alt="Edit"/></a></td><td class="tdIcon"><a href="http://localhost:80/ProjectManager/changerequest/view/'+ result[i].id +'"><img class="detailsIcon" src="http://localhost:80/ProjectManager/images/detailsIcon.png" alt="View Details"/></a></td><td class="tdIcon"><a class="btnDel" rel="'+ result[i].id +'" href="#"><img class="deleteIcon" src="http://localhost:80/ProjectManager/images/deleteIcon.png" alt="Delete"/></a>'+'</td></tr>');
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


