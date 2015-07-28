$(function(){
    getList(true);
});

var TABLE = {};

TABLE.paginate = function(table, pageLength) {
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
  $back
    .addClass('paging-disabled')
    .click(function() {
      pagination('<');
    });
  $next.click(function() {
    pagination('>');
  });
  
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

function getList(active)
{
    $('#tbDashboard tr.main').remove();   
       
    var url = "";
    if (active === true)
    {
        url = "http://localhost:80/ProjectManager/index/ajaxGetList/1";
    }
    else if (active === false)
    {
        url = "http://localhost:80/ProjectManager/index/ajaxGetList/0";
    }
    
    $.getJSON(url, function(result)
    {       
        console.log(result);
        for (var i = 0; i < result.length; i++)
        {
            var editURL = "http://localhost:80/ProjectManager/"+ result[i].type +"/edit/";
            var detailsURL = "http://localhost:80/ProjectManager/"+ result[i].type +"/view/";
                        
            $('#tbDashboard').append('<tr class="main"><td>' + result[i].type + '</td><td>' + result[i].id + '</td><td>' + result[i].name + '</td><td>' + result[i].priority + '</td><td>' + result[i].status + '</td><td><a href="'+ editURL + result[i].id +'"><img class="editIcon" src="http://localhost:80/ProjectManager/images/editIcon.png" alt="Edit"/></a></td><td><a href="'+ detailsURL + result[i].id +'"><img class="detailsIcon" src="http://localhost:80/ProjectManager/images/detailsIcon.png" alt="View Details"/></a></td><td><a id="'+ result[i].id +'" class="btnDel" rel="'+ result[i].type +'" href="#"><img class="deleteIcon" src="http://localhost:80/ProjectManager/images/deleteIcon.png" alt="Delete"/></a>'+'</td></tr>');
        }  
        
        $(".wrapper-paging").show();
        TABLE.paginate('#tbDashboard', 10);
        
        $('.btnDel').click(function(){
            var id = $(this).attr('id');
            var type= $(this).attr('rel');
            var ok = confirm('Are you sure you want to delete this item?');
                        
            if (ok)
            {
                switch(type)
                {
                case "bug":
                    deleteBug(id);
                    break;                
                case "testcase":
                    deleteTC(id);
                    break;
                case "changerequest":
                    deleteCR(id);
                    break;
                }               
            }
            
            return false;
        });        
    });   
}

function deleteBug(id)
{
    var url = "http://localhost:80/ProjectManager/bug/ajaxDelete/" + id;
    $.get(url, function()
    {
        alert('Bug Successfully Deleted');
        getList(true);
    });
}

function deleteTC(id)
{
    var url = "http://localhost:80/ProjectManager/testcase/ajaxDelete/" + id;
    $.get(url, function()
    {
        alert('Test Case Successfully Deleted');
        getList(true);
    });
}

function deleteCR(id)
{
    var url = "http://localhost:80/ProjectManager/changerequest/ajaxDelete/" + id;
    $.get(url, function()
    {
        alert('Change Request Successfully Deleted');
        getList(true);
    });
}
