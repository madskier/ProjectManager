<LINK href="<?php echo URL; ?>styles/requirement.css" rel="stylesheet" type="text/css">

<p id="pgTitle">View the Requirement</p>
<form id="fEditRequirement" name="fEditRequirement" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>requirement/ajaxUpdate/">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <table>
        <tr>
            <td>
                <label id="lblReqTitle" for="txtTitle">Title</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtTitle" name="txtTitle" disabled/>
            </td>
        </tr>
        <tr>
            <td>
                 <label id="lblDescription" for="txtaDescription">Description</label>
            </td>
            <td colspan="3">
                 <textarea id="txtaDescription" name="txtaDescription" cols="1" rows="1" disabled></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblRoles" for="txtaRoles">Role Permissions</label>                
            </td>
            <td colspan="3">
                <textarea id="txtaRoles" name="txtaRoles" cols="1" rows="1" disabled></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblRoles" for="txtaRules">Business Rules</label>                
            </td>
            <td colspan="3">
                <textarea id="txtaRules" name="txtaRules" cols="1" rows="1" disabled></textarea>
            </td>
        </tr>
        <tr>
            <td>
                 <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                 <select id="ddProject" name="ddProject" disabled>
                    <option value="" selected>Select a Requirement First</option>
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area Affected</label>
            </td>
            <td>
                <select id="ddArea" name="ddArea" disabled>
                    <option value="" selected>Select a Requirement First</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus" disabled>
                    
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                 <a id="btnSubmit" class="aButton" href="<?php echo URL; ?>requirement/listReq">Return To List</a> 
            </td>
        </tr>
    </table>     
</form>



