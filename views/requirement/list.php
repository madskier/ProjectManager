<LINK href="<?php echo URL; ?>styles/requirement.css" rel="stylesheet" type="text/css">
<div id="divReqSearch">
    <label id="lblProjectSearch">Search for a Requirement by Project</label>
    <select id="ddProjectList" onchange="getListAndArea(this.value)">
        <option value="" selected>Select a Project </option>
    </select>    
    <label id="lblAreaList">Search for a Requirement by Area</label>
    <select id="ddAreaList" onchange="getList()">
        <option value="" selected>Select an Area</option>
    </select>
    <label id="lblLMBSearch">Search for a Requirement by User</label>
    <select id="ddLMBList" onchange="getList()">
        <option value="" selected>Select a User</option>
    </select>    
</div>

<table id="tbReqList">
    <thead>
        <tr>
            <th>ID</th>
            <th>Requirement Title</th>
            <th>Area</th>
            <th>Last Modified By</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>    
</table>

