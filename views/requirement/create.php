<LINK href="<?php echo URL; ?>styles/requirement.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Create a New Requirement</p>
<form id="fCreateRequirement" name="fCreateRequirement" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>requirement/ajaxInsert/">
    <table id="tbBasic">
        <tr>
            <td>
                <label id="lblReqTitle" for="txtTitle">Title</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtTitle" name="txtTitle" required/>
            </td>
        </tr>
        <tr>
            <td>
                 <label id="lblDescription" for="txtaDescription">Description</label>
            </td>
            <td colspan="3">
                <textarea id="txtaDescription" name="txtaDescription" cols="1" rows="1"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblRoles" for="txtaRoles">Role Permissions</label>                
            </td>
            <td colspan="3">
                <textarea id="txtaRoles" name="txtaRoles" cols="1" rows="1"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblRoles" for="txtaRules">Business Rules</label>                
            </td>
            <td colspan="3">
                <textarea id="txtaRules" name="txtaRules" cols="1" rows="1"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                <select id="ddProject" name="ddProject" onchange="getArea(this.value, null, null)">
                    <option value="" selected>Select a Project</option>
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area Affected</label>
            </td>
            <td>
                <select id="ddArea" name="ddArea">
                    <option value="" selected>Select a Project First</option>
                </select>
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
        </tr>
        <tr>
            <td colspan="4">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Requirement"/>  
            </td>
        </tr>
    </table>     
</form>
