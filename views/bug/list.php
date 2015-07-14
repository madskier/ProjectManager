<LINK href="<?php echo URL; ?>styles/bug.css" rel="stylesheet" type="text/css">
<div id="divBugSearch">
    <label id="lblProjectSearch">Search for a Bug by Project</label>
    <select id="ddProjectList" onchange="getList()">
        <option value="" selected>Select a Project </option>
    </select>
    <label id="lblAssignedToSearch">Search for a Bug by Assignee</label>
    <select id="ddAssignedToList" onchange="getList()">
        <option value="" selected>Select a User</option>
    </select>
    <label id="lblStatusList">Search for a Bug by Status</label>
    <select id="ddStatusList" onchange="getList()">
        <option value="" selected>Select a Status</option>
    </select>
</div>

<table id="tbBugList">
    <thead>
        <tr>
            <th>ID</th>
            <th>Bug Title</th>
            <th>Status</th>
            <th>Assigned To</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    
</table>
