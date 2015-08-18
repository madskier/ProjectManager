<LINK href="<?php echo URL; ?>styles/project.css" rel="stylesheet" type="text/css">
<div id="divProjectSearch">
    <p id="pgProjectSearch">Search for a Project</p>
    <select id="ddSearchProject" name="ddSearchProject" onchange="getProjectByID(this.value)">
        <option value="" selected>Select a Project</option>
    </select>
</div>
<p id="pgTitle">Edit the Project</p>
<form id="fEditProject" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>project/ajaxUpdate/">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <table id="tbBasic">
        <tr>
            <td>
                <label id="lblTitle" for="txtTitle">Project Title</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtTitle" name="txtTitle"/>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Save Changes"/>
            </td>
        </tr>
    </table>   
</form>

