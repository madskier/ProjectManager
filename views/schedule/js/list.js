var gURL = globalURL;
$(function(){
    getCycleList();
});

function getCycleList()
{
    $('#tbCycleList tr.main').remove();
       
    var url = gURL + "schedule/ajaxGetCycleList/";
    
    $.getJSON(url, function(result)
    {       
        for (var i = 0; i < result.length; i++)
        {
            $('#tbCycleList').append('<tr class="main"><td class="firstCol">' + result[i].id + '</td><td>' + result[i].start_date + '</td><td>' + result[i].end_date + '</td><td>' + result[i].hours + '</td><td class="tdIcon"><a href="'+ gURL + 'schedule/edit/'+ result[i].id +'"><img class="editIcon" src="'+ gURL + 'images/editIcon.png" alt="Edit"/></a></td><td class="tdIcon"><a href="'+ gURL + 'schedule/view/'+ result[i].id +'"><img class="detailsIcon" src="'+ gURL +'images/detailsIcon.png" alt="View Details"/></a></td><td class="tdIcon"><a class="btnDel" rel="'+ result[i].id +'" href="#"><img class="deleteIcon" src="'+ gURL +'images/deleteIcon.png" alt="Delete"/></a></td></tr>');
        }  
        
        $(".wrapper-paging").show();
        TABLE.paginate('#tbCycleList', 10);
        
        $('.btnDel').click(function(){
            var id = $(this).attr('rel');
            var ok = confirm('Are you sure you want to delete Cycle #' + id);
            
            if (ok)
            {
               deleteCycle(id);
            }
            
            return false;
        });
    });   
}

function deleteCycle(id)
{
    var url = gURL + "schedule/ajaxDelete/" + id;
    $.get(url, function()
    {
        alert('Cycle Successfully Deleted');
        getCycleList();
    });
}

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




