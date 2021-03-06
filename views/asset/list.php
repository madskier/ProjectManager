<LINK href="<?php echo URL; ?>styles/listTable.css" rel="stylesheet" type="text/css">
<div id="divAssetSearch">
    <p id="pgAssetSearch">Search List By</p>    
    <label id="lblProjectSearch">Project</label>
    <select id="ddProjectList" onchange="getList(false)" class="searchParam">
        <option value="" selected>Select a Project </option>
    </select>
    <label id="lblAssignedToSearch">Assignee</label>
    <select id="ddAssignedToList" class="searchParam" onchange="getList(false)">
        <option value="" selected>Select a User</option>
    </select>
    <label id="lblStatusList">Status</label>
    <select id="ddStatusList" class="searchParam" onchange="getList(false)">
        <option value="" selected>Select a Status</option>
    </select>
    <label id="lblTypeList">Type</label>
    <select id="ddTypeList" class="searchParam" onchange="getList(false)">
        <option value="" selected>Select a Type</option>
    </select>
</div>
<p id="pTableTitleAsset">Asset List</p>
<div class="table-wrapper asset">
    <div class="wrapper-paging wrapperAsset">
        <ul>
            <li><a class="paging-back">&lt;</a></li>
            <li>
                <a class="paging-this"><strong>0</strong> of <span>x</span></a>
            </li>
            <li><a class="paging-next">&gt;</a></li>
        </ul>
    </div>
    <div class="wrapper-panel">
        <table id="tbAssetList">
            <colgroup>
                <col class="colID" />
                <col class="colName" />
                <col class="colType" />
                <col class="colStatus" />
                <col class="colUser" />
            </colgroup>
            <thead>
                <tr>
                    <th scope="col" class="firstCol">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Assigned To</th>
                    <th scope="col" class="tdIcon"></th>
                    <th scope="col" class="tdIcon"></th>
                    <th scope="col" class="tdIcon"></th>
                </tr>
            </thead>    
        </table>
    </div>
</div>
