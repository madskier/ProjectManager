var gURL = globalURL;
function getList()
{
    $('#tbWorkItemList tr.main').remove();   
    var url = gURL + "schedule/ajaxGetList/";
    
    $.getJSON(url, function(result)
    {                       
        for (var i = 0; i < result.length; i++)
        {
            var typeNoSpaces = result[i].type.replace(/\s/g, '');
            $('#tbWorkItemList').append('<tr class="main"><td class="tdIcon"><input type="checkbox" id="' + result[i].id + '" rel="'+ result[i].type +'" class="cbTable" onclick="handleMove(this)" name="'+ typeNoSpaces + '_' + result[i].id+'"/></td><td class="tdID">' + result[i].id + '</td><td class="tdType">' + result[i].type + '</td><td class="tdName">' + result[i].name + '</td><td class="tdHours">' + result[i].complete_time + '</td></td></tr>');            
        }                  
    });
}

function getListByID(cycleID)
{
    $('#tbCycleWorkList tr.main').remove();
    
    var url = gURL + "schedule/ajaxGetListByID/" + cycleID;
    
    $.getJSON(url, function(result)
    {                       
        for (var i = 0; i < result.length; i++)
        {
            var typeNoSpaces = result[i].type.replace(/\s/g, '');
            var currHours = Number($('#txtTotalHours').val());
            
            $('#tbCycleWorkList').append('<tr class="main"><td class="tdIcon"><input type="checkbox" id="' + result[i].id + '" rel="'+ result[i].type +'" class="cbTable" onclick="handleMoveBack(this)" name="'+ typeNoSpaces + '_' + result[i].id+'" checked="checked"/></td><td class="tdID">' + result[i].id + '</td><td class="tdType">' + result[i].type + '</td><td class="tdName">' + result[i].name + '</td><td class="tdHours">' + result[i].complete_time + '</td></td></tr>');
            $('#txtTotalHours').val(currHours + Number(result[i].complete_time));
            $('#tbWorkItemList tr td input').each(function(){                
                var type = $(this).attr('rel');
                var id = $(this).attr('id');
                if (id === result[i].id && type === result[i].type)
                {                    
                    $(this).closest('tr').remove();
                }
            });
        }                  
    });
}

function handleMove(checkboxItem)
{
    
    var id = $(checkboxItem).attr('id');
    var type = $(checkboxItem).attr('rel');
    var typeNoSpaces = type.replace(/\s/g, '');
    var row = $(checkboxItem).closest('td').parent()[0].sectionRowIndex;
  
    var name = $('#tbWorkItemList tr').eq(row + 1).find('.tdName').text();
    var hours = $('#tbWorkItemList tr').eq(row + 1).find('.tdHours').text();
    
    var newHours = Number(hours);
    var currTotal = $('#txtTotalHours').val();
    currTotal = Number(currTotal);
    
    if (checkboxItem.checked)
    {        
        $('#tbCycleWorkList').append('<tr class="main"><td class="tdIcon"><input type="checkbox" id="' + id + '" rel="'+ type +'" checked="checked" class="cbTable" onclick="handleMoveBack(this)" name="'+typeNoSpaces + '_' + id+'"></td><td class="tdID">' + id + '</td><td class="tdType">' + type + '</td><td class="tdName">' + name + '</td><td class="tdHours">' + hours + '</td></td></tr>');
        $('#tbWorkItemList tr').eq(row + 1).remove();
        $('#txtTotalHours').val(currTotal + newHours);
        calculateCompletionDate();
    }
}

function handleMoveBack(checkboxItem)
{
    var id = $(checkboxItem).attr('id');
    var type = $(checkboxItem).attr('rel');
    var typeNoSpaces = type.replace(/\s/g, '');
    var row = $(checkboxItem).closest('td').parent()[0].sectionRowIndex;
       
    var name = $('#tbCycleWorkList tr').eq(row + 1).find('.tdName').text();
    var hours = $('#tbCycleWorkList tr').eq(row + 1).find('.tdHours').text();    
    
    var minusHours = Number(hours);
    var currTotal = $('#txtTotalHours').val();
    currTotal = Number(currTotal);
  
    if (!checkboxItem.checked)
    {   
        $('#tbWorkItemList').append('<tr class="main"><td class="tdIcon"><input type="checkbox" id="' + id + '" rel="'+ type +'" class="cbTable" onclick="handleMove(this)" name="'+typeNoSpaces + '_' + id+'"/></td><td class="tdID">' + id + '</td><td class="tdType">' + type + '</td><td class="tdName">' + name + '</td><td class="tdHours">' + hours + '</td></td></tr>');
        $('#tbCycleWorkList tr').eq(row + 1).remove();
        $('#txtTotalHours').val(currTotal - minusHours);
        calculateCompletionDate();
    }
    
}

function calculateCompletionDate()
{   
    if ($('#txtEndDate').is(':disabled'))
    {
        var currDate = $('#txtStartDate').val();
    
        var formattedDate = new Date(currDate);
        var d = formattedDate.getDate();
        var m =  formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11
        var y = formattedDate.getFullYear();

        if(!isNaN(m) && !isNaN(d) && !isNaN(y))
        {
            var teamSize = $('#txtTeamSize').val();
            var totalHours = $('#txtTotalHours').val();
            var numDays = 0;
            
            $('#hdnHours').val(totalHours);
            if (totalHours > 0)
            {
               numDays = Math.ceil(totalHours / 8);           
            }

            if (y > 2014 && teamSize > 0)
            {
                numDays = Math.ceil(numDays / teamSize) + 1;

                var endDate = formattedDate;           
                endDate.setDate(endDate.getDate() + numDays); 

                var endDay = endDate.getDate();
                var endMonth =  endDate.getMonth();
                endMonth += 1;  // JavaScript months are 0-11
                var endYear = endDate.getFullYear();

                if (endMonth < 10)
                {
                    endMonth = "0" + endMonth;
                }
                if (endDay < 10)
                {
                    endDay = "0" + endDay;
                }

                var populateString = endYear + "-" + endMonth + "-" + endDay;

                $('#txtEndDate').val(populateString);
                
                $('#hdnEndDate').val(populateString);                
            }
        }   
    }    
}

function fillHidden()
{
    $('#hdnEndDate').val($('#txtEndDate').val());
    $('#hdnHours').val($('#txtTotalHours').val());
}
    
function manualOverride(checkbox)
{
    if (!checkbox.checked)
    {
        $('#txtEndDate').prop('disabled', false);
    }
    else
    {
        $('#txtEndDate').prop('disabled', true);
        calculateCompletionDate();
    }
}

function getCycleByID(cycleID)
{
    var url = gURL + "schedule/ajaxGetCycleByID/" + cycleID;
    getList();
    $.getJSON(url, function(result)
    {
        $('#txtStartDate').val(result.startDate);
        $('#txtEndDate').val(result.endDate);        
        $('#txtTeamSize').val(result.teamSize);
        $('#txtTotalHours').val(0);
        $('#hdnEndDate').val(result.endDate);
        $('#hdnHours').val(result.totalHours);
        $('#hdnID').val(cycleID);
        getListByID(cycleID);        
    });
}

function getCycleByIDAndDisable(cycleID)
{
    var url = gURL + "schedule/ajaxGetCycleByID/" + cycleID;
    getListAndDisable();
    $.getJSON(url, function(result)
    {
        $('#txtStartDate').val(result.startDate);
        $('#txtEndDate').val(result.endDate);        
        $('#txtTeamSize').val(result.teamSize);
        $('#txtTotalHours').val(0);
        $('#hdnEndDate').val(result.endDate);
        $('#hdnHours').val(result.totalHours);
        $('#hdnID').val(cycleID);
        getListByIDAndDisable(cycleID);        
    });    
}

function getListByIDAndDisable(cycleID)
{
    $('#tbCycleWorkList tr.main').remove();
    
    var url = gURL + "schedule/ajaxGetListByID/" + cycleID;
    
    $.getJSON(url, function(result)
    {                       
        for (var i = 0; i < result.length; i++)
        {
            var typeNoSpaces = result[i].type.replace(/\s/g, '');
            var currHours = Number($('#txtTotalHours').val());
            
            $('#tbCycleWorkList').append('<tr class="main"><td class="tdIcon"><input type="checkbox" id="' + result[i].id + '" rel="'+ result[i].type +'" class="cbTable" onclick="handleMoveBack(this)" name="'+ typeNoSpaces + '_' + result[i].id+'" checked="checked" disabled/></td><td class="tdID">' + result[i].id + '</td><td class="tdType">' + result[i].type + '</td><td class="tdName">' + result[i].name + '</td><td class="tdHours">' + result[i].complete_time + '</td></td></tr>');
            $('#txtTotalHours').val(currHours + Number(result[i].complete_time));
            $('#tbWorkItemList tr td input').each(function(){                
                var type = $(this).attr('rel');
                var id = $(this).attr('id');
                if (id === result[i].id && type === result[i].type)
                {                    
                    $(this).closest('tr').remove();
                }
            });
        }                  
    });
}

function getListAndDisable()
{
    $('#tbWorkItemList tr.main').remove();
    
    var url = gURL + "schedule/ajaxGetList/";
    
    $.getJSON(url, function(result)
    {                       
        for (var i = 0; i < result.length; i++)
        {
            var typeNoSpaces = result[i].type.replace(/\s/g, '');
            $('#tbWorkItemList').append('<tr class="main"><td class="tdIcon"><input type="checkbox" id="' + result[i].id + '" rel="'+ result[i].type +'" class="cbTable" onclick="handleMove(this)" name="'+ typeNoSpaces + '_' + result[i].id+'" disabled/></td><td class="tdID">' + result[i].id + '</td><td class="tdType">' + result[i].type + '</td><td class="tdName">' + result[i].name + '</td><td class="tdHours">' + result[i].complete_time + '</td></td></tr>');
        }                  
    });
}




    




