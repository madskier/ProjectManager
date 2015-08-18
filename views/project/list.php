<LINK href="<?php echo URL; ?>styles/listTable.css" rel="stylesheet" type="text/css">

<p id="pTableTitleProject">Project List</p>
<div class="table-wrapper project">
    <div class="wrapper-paging wrapperProject">
        <ul>
            <li><a class="paging-back">&lt;</a></li>
            <li>
                <a class="paging-this"><strong>0</strong> of <span>x</span></a>
            </li>
            <li><a class="paging-next">&gt;</a></li>
        </ul>
    </div>
    <div class="wrapper-panel">
        <table id="tbProjectList">
            <colgroup>
                <col class="colID" />
                <col class="colName" />
            </colgroup>
            <thead>
                <tr>
                    <th scope="col" class="firstCol">ID</th>
                    <th scope="col">Title</th>            
                    <th scope="col" class="tdIcon"></th>
                    <th scope="col" class="tdIcon"></th>
                </tr>
            </thead>    
        </table>
    </div>
</div>
