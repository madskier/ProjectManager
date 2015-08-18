<LINK href="<?php echo URL; ?>styles/schedule.css" rel="stylesheet" type="text/css">
<LINK href="<?php echo URL; ?>styles/listTable.css" rel="stylesheet" type="text/css">
<form id="fCreateCycle" name="fCreateCycle" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>schedule/ajaxInsert/">
    <div id="divCycle">
        <p id="pgCycle">Create Cycle</p>
        <label id="lblStartDate" for="txtStartDate">Start Date:</label>
        <input type="date" id="txtStartDate" name="txtStartDate" placeholder="mm/dd/yyyy" onchange="calculateCompletionDate(this.value)" required/>
        <label id="lblEndDate" for="txtEndDate">End Date:</label>
        <input type="date" id="txtEndDate" name="txtEndDate" onchange="fillHidden()" disabled/>        
        <input type="checkbox" id="cbOverride" name="cbOverride" checked="checked" onchange="manualOverride(this)"/>
        <label id="lblOverride" for="cbOverride">Auto Date</label>
        <label id="lblTeamSize" for="txtTeamSize">Team Size:</label>
        <input type="number" id="txtTeamSize" name="txtTeamSize" onchange="calculateCompletionDate()" required/>    
        <label id="lblTotalHours" for="txtTotalHours">Total Hours:</label>
        <input type="number" id="txtTotalHours" name="txtTotalHours" disabled/>        
        <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Cycle" />
        <input type="hidden" id="hdnEndDate" name="hdnEndDate"/>
        <input type="hidden" id="hdnHours" name="hdnHours"/>
    </div>
    <div id="divTableNames">
        <p id="pTableWorkItems">Work Items</p>
        <p id="pTableCycleWork">Cycle This Work</p>
    </div>
    <div class="table-wrapper workItem">    
        <div class="wrapper-panel">
            <table id="tbWorkItemList">    
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




