<LINK href="<?php echo URL; ?>styles/bug.css" rel="stylesheet" type="text/css">
<div id="divBugSearch">
    <p id="pgBugSearch">Search for a Bug</p>
    <select id="ddSearchProject" name="ddSearchProject" onchange="getTitles(this.value)">
        <option value="" selected>Select a Project</option>
    </select>
    <select id="ddSearchTitle" name="ddSearchTitle" onchange="getBugByID(this.value)">
        <option value="" selected>Select a Project First</option>
    </select>
</div>
<p id="pgTitle">Edit the Bug</p>
<form id="fEditBug" method="post" name="fEditBug" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>bug/ajaxUpdate/">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <table>
        <tr>
            <td>
                <label id="lblTitle" for="txtTitle">Title</label>
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
                <textarea id="txtaDescription" name="txtaDescription" form="fEditBug"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                 <select id="ddProject" name="ddProject" onchange="getArea(this.value, null)">
                    <option value="" selected>Select a Bug First</option>
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area Affected</label>
            </td>
            <td>
                <select id="ddArea" name="ddArea">
                    <option value="" selected>Select a Bug First</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblRepro" for="txtaRepro">Reproduction Steps</label>
            </td>
            <td colspan="3">
                <textarea id="txtaRepro" name="txtaRepro" form="fEditBug" required></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus">
                    <option value="" selected>Select a Bug First</option>        
                </select>
            </td>
            <td>
                <label id="lblPlatform" for="ddPlatform">Platform</label>
            </td>
            <td>
                <select id="ddPlatform" name="ddPlatform">
                    <option value="" selected>Select a Bug First</option>
                </select>  
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label> 
            </td>
            <td colspan="3">
                <select id="ddAssignedTo" name="ddAssignedTo">
                    <option value="" selected>Select a User</option>
                </select> 
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblTime" for="txtTime">Completion Time: </label>
            </td>
            <td colspan="2">
                <input type="number" id="txtTime" name="txtTime"/>
            </td>            
            <td>
                <select id="ddTime" name="ddTime">
                    <option value="Hours">Hours</option>
                    <option value="Days">Days</option>
                    <option value="Weeks">Weeks</option>
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
