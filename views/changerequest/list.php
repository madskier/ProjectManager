<LINK href="<?php echo URL; ?>styles/bug.css" rel="stylesheet" type="text/css">
<div id="divBugSearch">
    <label id="lblProjectSearch">Search for a CR by Project</label>
    <select id="ddProjectList" onchange="getList()">
        <option value="" selected>Select a Project </option>
    </select>
    <label id="lblAssignedToSearch">Search for a CR by Assignee</label>
    <select id="ddAssignedToList" onchange="getList()">
        <option value="" selected>Select a User</option>
    </select>
    <label id="lblStatusList">Search for a CR by Status</label>
    <select id="ddStatusList" onchange="getList()">
        <option value="" selected>Select a Status</option>
    </select>
</div>

<table id="tbCRList">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Assigned To</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>    
</table>
