<LINK href="<?php echo URL; ?>styles/project.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Create a New Project</p>
<form id="fCreateProject" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>project/ajaxInsert/">
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
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Project"/>
            </td>
        </tr>
    </table>   
</form>
