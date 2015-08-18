<LINK href="<?php echo URL; ?>styles/listTable.css" rel="stylesheet" type="text/css">
<div id="divReqSearch">
    <p id="pgReqSearch">Search List By</p>
    <label id="lblProjectSearch" for="ddProjectList">Project</label>
    <select id="ddProjectList" class="searchParam" onchange="getListAndArea(this.value)">
        <option value="" selected>Select a Project </option>
    </select>    
    <label id="lblAreaList" for="ddAreaList">Area</label>
    <select id="ddAreaList" class="searchParam" onchange="getList(false)">
        <option value="" selected>Select an Area</option>
    </select>
    <label id="lblStatusList" for="ddStatusList">Status</label>
    <select id="ddStatusList" class="searchParam" onchange="getList(false)">
        <option value="" selected>Select a Status</option>
    </select>
    <label id="lblLMBSearch" for="ddLMBList">Edited By</label>
    <select id="ddLMBList" class="searchParam" onchange="getList(false)">
        <option value="" selected>Select a User</option>
    </select>    
</div>
<p id="pTableTitleReq">Requirement List</p>
 <div class="table-wrapper req">
    <div class="wrapper-paging wrapperReq">
        <ul>
            <li><a class="paging-back">&lt;</a></li>
            <li>
                <a class="paging-this"><strong>0</strong> of <span>x</span></a>
            </li>
            <li><a class="paging-next">&gt;</a></li>
        </ul>
    </div>
    <div class="wrapper-active">
        <input type="checkbox" id="cbActive" name="cbActive" onchange="getList(false)">
        <label id="lblActive" >Show Inactive</label>
    </div>
    <div class="wrapper-panel">
        <table id="tbReqList">
             <colgroup>
                <col class="colID" />
                <col class="colName" />
                <col class="colArea" />
                <col class="colStatus"/>
                <col class="colUser" />
            </colgroup>
            <thead>
                <tr>
                    <th scope="col" class="firstCol">ID</th>
                    <th scope="col">Requirement Title</th>
                    <th scope="col">Area</th>
                    <th scope="col">Status</th>
                    <th scope="col">Last Modified By</th>                    
                    <th scope="col" class="tdIcon"></th>
                    <th scope="col" class="tdIcon"></th>
                    <th scope="col" class="tdIcon"></th>
                </tr>
            </thead>    
        </table>
    </div>
 </div>

