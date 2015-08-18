<LINK href="<?php echo URL; ?>styles/asset.css" rel="stylesheet" type="text/css">
<p id="pgTitle">View the Asset</p>
<form id="fEditAsset" name="fEditAsset" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>asset/ajaxUpdate/">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <table id="tbBasic">
        <tr>
            <td>
                <label id="lblTitle" for="txtTitle">Title</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtTitle" name="txtTitle" disabled/>
            </td>
        </tr>
        <tr>
            <td>
                 <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus" disabled>
                    <option value="" selected>Select an Asset First
                </select>
            </td>
            <td>
                 <label id="lblType" for="ddType">Type</label>
            </td>
            <td>
                <select id="ddType" name="ddType" disabled>
                    <option value="" selected>Select an Asset First</option>        
                </select>
            </td>
        </tr>
        <tr id="row0">            
            <td>
                <label id="lblProject" for="ddProject">Project</label>                
            </td>
            <td>
                 <select id="ddProject" name="ddProject" disabled>
                    <option value="" selected>Select an Asset First</option>
                </select>
            </td>
            <td>
                <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
            </td>
            <td>
                <select id="ddAssignedTo" name="ddAssignedTo" disabled>
                    <option value="" selected>Select an Asset First</option>
                </select>
            </td>
        </tr>
        <tr>            
            <td colspan="4">
                <a id="btnSubmit" class="aButton" href="<?php echo URL; ?>asset/listAsset">Return To List</a>
            </td>
        </tr>
    </table>       
</form>
