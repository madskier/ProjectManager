var gURL = globalURL;
$(function(){
    
    getProject(null, '#ddProjectList');    
    getEmployee(null, '#ddLMBList');    
    getStatus(null, '#ddStatusList');
    getList(true);
});

function getListAndArea(projectID)
{
    getArea(projectID, null, '#ddAreaList');
    getList(false);
}

function getList(firstTime)
{
    $('#tbReqList tr.main').remove();
    var project = $('#ddProjectList').val();
    var lmb = $('#ddLMBList').val();
    var area = $('#ddAreaList').val();  
    var status = $('#ddStatusList').val();
    var active = $('#cbActive').prop('checked');
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
    
    if (status === "")
    {
        status = "0";
    }
    
    var url = gURL + "requirement/ajaxGetList/" + project + "/" + lmb + "/" + area + "/" + status + "/" + active.toString();
    
    $.getJSON(url, function(result)
    {       
        for (var i = 0; i < result.length; i++)
        {
            $('#tbReqList').append('<tr class="main"><td class="firstCol">' + result[i].id + '</td><td>' + result[i].name + '</td><td>' + result[i].area_affected + '</td><td>' + result[i].status + '</td><td>' + result[i].last_modified_by + '</td><td class="tdIcon"><a href="'+ gURL + 'requirement/edit/'+ result[i].id +'"><img class="editIcon" src="'+ gURL + 'images/editIcon.png" alt="Edit"/></a></td><td class="tdIcon"><a href="'+ gURL + 'requirement/view/'+ result[i].id +'"><img class="detailsIcon" src="'+ gURL +'images/detailsIcon.png" alt="View Details"/></a></td><td class="tdIcon"><a class="btnDel" rel="'+ result[i].id +'" href="#"><img class="deleteIcon" src="'+ gURL +'images/deleteIcon.png" alt="Delete"/></a></td></tr>');
        }  
        
        $(".wrapper-paging").show();
        TABLE.paginate('#tbReqList', 10, firstTime);
        
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
    var url = gURL + "requirement/ajaxDelete/" + id;
    $.get(url, function()
    {
        alert('Requirement Successfully Deleted');
        getList(false);
    });
}

var TABLE = {};

TABLE.paginate = function(table, pageLength, firstTime) {
  // 1. Set up paging information
  var $table = $(table);
  var $rows = $table.find('tbody > tr');
  var numPages = Math.ceil($rows.length / pageLength) - 1;
 
  var current = 0;
  
  // 2. Set up the navigation controls
  var $nav = $table.parents('.table-wrapper').find('.wrapper-paging ul');
  var $back = $nav.find('li:first-child a');
  var $next = $nav.find('li:last-child a');
  
  $nav.find('a.paging-this strong').text(current + 1);
  $nav.find('a.paging-this span').text(numPages + 1);
 if (firstTime === true)
 {
    $back
    .addClass('paging-disabled')
    .click(function() {
      pagination('<');
    });
 
    $next.click(function() {
      pagination('>');
    });
 }
  
  // 3. Show initial rows
  $rows
    .hide()
    .slice(0,pageLength)
    .show();
    
  pagination = function (direction) { // 4. Move previous and next  
    
    var reveal = function (current) { // 5. Reveal the correct rows
      $back.removeClass('paging-disabled');
      $next.removeClass('paging-disabled');
      
      $rows
        .hide()
        .slice(current * pageLength, current * pageLength + pageLength)
        .show();
        
      $nav.find('a.paging-this strong').text(current + 1);
    };    
    
    if (direction == "<") { // previous
      if (current > 1) {
	(current -= 1);
      }
      else if (current == 1) {
	(current -= 1);
	$back.addClass("paging-disabled");
      }
    } else { // next
      if (current < numPages - 1) {
	current += 1;
      }
      else if (current == numPages - 1) {
	current += 1;
	$next.addClass("paging-disabled");
      }
    }
    reveal(current);
  }
}


