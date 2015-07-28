$(function(){
    
    getProject(null, '#ddProjectList');    
    getEmployee(null, '#ddLMBList');
});

function getListAndArea(projectID)
{
    getArea(projectID, null, '#ddAreaList');
    getList();
}

function getList()
{
    $('#tbReqList tr.main').remove();
    var project = $('#ddProjectList').val();
    var lmb = $('#ddLMBList').val();
    var area = $('#ddAreaList').val();  
    
    if (project === "")
    {
        project = 0;
    }
    
    if (lmb === "")
    {
        lmb = 0;
    }
    
    if (area === "")
    {
        area = 0;
    }
    
    var url = "http://localhost:80/ProjectManager/requirement/ajaxGetList/" + project + "/" + lmb + "/" + area;
    
    $.getJSON(url, function(result)
    {       
        for (var i = 0; i < result.length; i++)
        {
            $('#tbReqList').append('<tr class="main"><td class="firstCol">' + result[i].id + '</td><td>' + result[i].name + '</td><td>' + result[i].area_affected + '</td><td>' + result[i].last_modified_by + '</td><td class="tdIcon"><a href="http://localhost:80/ProjectManager/requirement/edit/'+ result[i].id +'"><img class="editIcon" src="http://localhost:80/ProjectManager/images/editIcon.png" alt="Edit"/></a></td><td class="tdIcon"><a href="http://localhost:80/ProjectManager/requirement/view/'+ result[i].id +'"><img class="detailsIcon" src="http://localhost:80/ProjectManager/images/detailsIcon.png" alt="View Details"/></a></td><td class="tdIcon"><a class="btnDel" rel="'+ result[i].id +'" href="#"><img class="deleteIcon" src="http://localhost:80/ProjectManager/images/deleteIcon.png" alt="Delete"/></a></td></tr>');
        }  
        
        $('.btnDel').click(function(){
            var id = $(this).attr('rel');
            var ok = confirm('Are you sure you want to delete Requirement #' + id);
            
            if (ok)
            {
               deleteReq(id);
            }
            
            return false;
        });
    });   
}

function deleteReq(id)
{
    var url = "http://localhost:80/ProjectManager/requirement/ajaxDelete/" + id;
    $.get(url, function()
    {
        alert('Requirement Successfully Deleted');
        getList();
    });
}


