<LINK href="<?php echo URL; ?>styles/asset.css" rel="stylesheet" type="text/css">

<div id="divAssetSearch">
    <p id="pgAssetSearch">Search for an Asset</p>
    <select id="ddSearchProject" name="ddSearchProject" onchange="getTitles(this.value)">
        <option value="" selected>Select a Project</option>
    </select>
    <select id="ddSearchTitle" name="ddSearchTitle" onchange="getAssetByID(this.value)">
        <option value="" selected>Select a Project First</option>
    </select>
</div>
<p id="pgTitle">Edit the Asset</p>
<form id="fEditAsset" name="fEditAsset" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>asset/ajaxUpdate/">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <table id="tbBasic">
        <tr>
            <td>
                <label id="lblTitle" for="txtTitle">Title</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtTitle" name="txtTitle"/>
            </td>
        </tr>
        <tr>
            <td>
                 <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus">
                    <option value="" selected>Select an Asset First
                </select>
            </td>
            <td>
                 <label id="lblType" for="ddType">Type</label>
            </td>
            <td>
                <select id="ddType" name="ddType">
                    <option value="" selected>Select an Asset First</option>        
                </select>
            </td>
        </tr>
        <tr id="row0">            
            <td>
                <label id="lblProject" for="ddProject">Project</label>                
            </td>
            <td>
                 <select id="ddProject" name="ddProject">
                    <option value="" selected>Select an Asset First</option>
                </select>
            </td>
            <td>
                <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
            </td>
            <td>
                <select id="ddAssignedTo" name="ddAssignedTo">
                    <option value="" selected>Select an Asset First</option>
                </select>
            </td>
        </tr>
        <tr>            
            <td colspan="4">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Save Changes"/>
            </td>
        </tr>
    </table>       
</form>



