<LINK href="<?php echo URL; ?>styles/schedule.css" rel="stylesheet" type="text/css">
<LINK href="<?php echo URL; ?>styles/listTable.css" rel="stylesheet" type="text/css">
<form id="fEditCycle" name="fEditCycle" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>schedule/ajaxUpdate/">
    <div id="divCycle">
        <p id="pgCycle">Edit Cycle</p>
        <label id="lblStartDate" for="txtStartDate">Start Date:</label>
        <input type="date" id="txtStartDate" name="txtStartDate" placeholder="mm/dd/yyyy" disabled/>
        <label id="lblEndDate" for="txtEndDate">End Date:</label>
        <input type="date" id="txtEndDate" name="txtEndDate"disabled/>        
        <input type="checkbox" id="cbOverride" name="cbOverride" checked="checked" disabled/>
        <label id="lblOverride" for="cbOverride">Auto Date</label>
        <label id="lblTeamSize" for="txtTeamSize">Team Size:</label>
        <input type="number" id="txtTeamSize" name="txtTeamSize" disabled/>    
        <label id="lblTotalHours" for="txtTotalHours">Total Hours:</label>
        <input type="number" id="txtTotalHours" name="txtTotalHours" disabled/>        
        <a id="btnSubmit" class="aButton" href="<?php echo URL; ?>schedule/listSchedule">Return To List</a> 
        <input type="hidden" id="hdnEndDate" name="hdnEndDate"/>
        <input type="hidden" id="hdnHours" name="hdnHours"/>
        <input type="hidden" id="hdnID" name="hdnID"/>
    </div>
    <div id="divTableNames">
        <p id="pTableWorkItems" style="color: #fff;">Work Items</p>
        <p id="pTableCycleWork">Cycle This Work</p>
    </div>
    <div class="table-wrapper workItem">    
        <div class="wrapper-panel">
            <table id="tbWorkItemListView" >    
                <colgroup>
                    <col class="colCheckbox">
                    <col class="colID">
                    <col class="colID">
                    <col class="colName">
                    <col class="colHours">
                </colgroup>
                <thead>
                    <tr>
                        <th scope="col" class="tdIcon"></th>
                        <th scope="col">ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Hours</th>                    
                    </tr>
                </thead>
            </table>
        </div>    
        <div class="wrapper-panel right">
            <table id="tbCycleWorkList">    
                <colgroup>
                    <col class="colCheckbox">
                    <col class="colID">
                    <col class="colID">
                    <col class="colName">
                    <col class="colHours">
                </colgroup>
                <thead>
                    <tr>
                        <th scope="col" class="tdIcon"></th>
                        <th scope="col">ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Hours</th>                    
                    </tr>
                </thead>            
            </table>
        </div>
    </div>
    <div id="divArrow">
        <img src="" id="imgArrow"/>
    </div>
</form>
