<LINK href="<?php echo URL; ?>styles/listTable.css" rel="stylesheet" type="text/css">
<div id="quicknav">
    <p id="pTableTitle">Assigned To You</p>
    <div class="table-wrapper">
        <div class="wrapper-paging">
            <ul>
                <li><a class="paging-back">&lt;</a></li>
                <li>
                    <a class="paging-this"><strong>0</strong> of <span>x</span></a>
                </li>
                <li><a class="paging-next">&gt;</a></li>
            </ul>
        </div>
        <div class="wrapper-panel">
             <table id="tbDashboard">
                <colgroup>
                    <col class="colType" />
                    <col class="colID" />
                    <col class="colName" />
                    <col class="colPriority" />
                    <col class="colStatus"/>
                </colgroup>
                <thead>
                    <tr>
                    <th scope="col">Type</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr> 
                </thead>
                <tbody>

                </tbody>       
            </table>
        </div>
    </div>   
    
    <ul id="dashboardNav">
        <li>
            <a class="aButton" href="<?php echo URL; ?>bug/listBug">Bug List</a>
        </li>
        <li>
            <a class="aButton" href="<?php echo URL; ?>requirement/listReq">Requirements List</a>
        </li>
        <li>
            <a class="aButton" href="<?php echo URL; ?>changerequest/listCR">Change Request List</a>
        </li>
        <li>
            <a class="aButton" href="<?php echo URL; ?>testcase/listTC">Test Case List</a>
        </li>
    </ul>   
</div>
