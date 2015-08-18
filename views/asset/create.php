<LINK href="<?php echo URL; ?>styles/asset.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Create a New Asset</p>
<form id="fCreateAsset" name="fCreateAsset" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>asset/ajaxInsert/">
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
                </select>
            </td>
            <td>
                 <label id="lblType" for="ddType">Type</label>
            </td>
            <td>
                <select id="ddType" name="ddType">
                    <option value="" selected>Select a Type</option>        
                </select>
            </td>
        </tr>
        <tr id="row0">            
            <td>
                <label id="lblProject" for="ddProject">Project</label>                
            </td>
            <td>
                 <select id="ddProject" name="ddProject">
                    <option value="" selected>Select a Project</option>
                </select>
            </td>
            <td>
                <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
            </td>
            <td>
                <select id="ddAssignedTo" name="ddAssignedTo">
                    <option value="" selected>Select a User</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="button" id="btnAddTitle" onclick="addTitle()">Add More</button>
            </td>
            <td colspan="2">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Asset(s)"/>
            </td>
        </tr>
    </table>   
</form>

