<LINK href="<?php echo URL; ?>styles/listTable.css" rel="stylesheet" type="text/css">
<div id="divReqSearch">
    <p id="pgReqSearch">Search List By</p>
    <label id="lblProjectSearch" for="ddProjectList">Project</label>
    <select id="ddProjectList" class="searchParam" onchange="getListAndArea(this.value)">
        <option value="" selected>Select a Project </option>
    </select>    
    <label id="lblAreaList" for="ddAreaList">Area</label>
    <select id="ddAreaList" class="searchParam" onchange="getList()">
        <option value="" selected>Select an Area</option>
    </select>
    <label id="lblLMBSearch" for="ddLMBList">Edited By</label>
    <select id="ddLMBList" class="searchParam" onchange="getList()">
        <option value="" selected>Select a User</option>
    </select>    
</div>
<p id="pTableTitleReq">Requirement List</p>
<table id="tbReqList">
     <colgroup>
        <col class="colID" />
        <col class="colName" />
        <col class="colArea" />
        <col class="colUser" />
    </colgroup>
    <thead>
        <tr>
            <th scope="col" class="firstCol">ID</th>
            <th scope="col">Requirement Title</th>
            <th scope="col">Area</th>
            <th scope="col">Last Modified By</th>
            <th scope="col" class="tdIcon"></th>
            <th scope="col" class="tdIcon"></th>
            <th scope="col" class="tdIcon"></th>
        </tr>
    </thead>    
</table>

