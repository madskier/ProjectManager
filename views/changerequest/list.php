<LINK href="<?php echo URL; ?>styles/listTable.css" rel="stylesheet" type="text/css">
<div id="divCRSearch">
    <p id="pgCRSearch">Search List By</p>    
    <label id="lblProjectSearch">Project</label>
    <select id="ddProjectList" onchange="getList()" class="searchParam">
        <option value="" selected>Select a Project </option>
    </select>
    <label id="lblAssignedToSearch">Assignee</label>
    <select id="ddAssignedToList" class="searchParam" onchange="getList()">
        <option value="" selected>Select a User</option>
    </select>
    <label id="lblStatusList">Status</label>
    <select id="ddStatusList" class="searchParam" onchange="getList()">
        <option value="" selected>Select a Status</option>
    </select>
</div>
<p id="pTableTitleCR">Change Request List</p>
<table id="tbCRList">
    <colgroup>
        <col class="colID" />
        <col class="colName" />
        <col class="colStatus" />
        <col class="colUser" />
    </colgroup>
    <thead>
        <tr>
            <th scope="col" class="firstCol">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Assigned To</th>
            <th scope="col" class="tdIcon"></th>
            <th scope="col" class="tdIcon"></th>
            <th scope="col" class="tdIcon"></th>
        </tr>
    </thead>    
</table>

