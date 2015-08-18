<LINK href="<?php echo URL; ?>styles/bug.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Create a New Bug</p>
<form id="fCreateBug" name="fCreateBug" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>bug/ajaxInsert/">
    <table id="tbBasic">
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
                <textarea id="txtaDescription" name="txtaDescription" cols="10" rows="10" form="fCreateBug"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                 <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                 <select id="ddProject" name="ddProject" onchange="getArea(this.value, null)" required>
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
                 <label id="lblRepro" for="txtaRepro">Reproduction Steps</label>
            </td>
            <td colspan="3">
                <textarea id="txtaRepro" name="txtaRepro" cols="1" rows="1" form="fCreateBug" required></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus">
                    <option value="Unverified" selected>New - Unverified</option>
                    <option value="Verified">New - Verified by Test Team</option>        
                </select>
            </td>
            <td>
                <label id="lblPlatform" for="ddPlatform">Platform</label>
            </td>
            <td>
                <select id="ddPlatform" name="ddPlatform">
                    <option value="" selected>Select a Platform</option>
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
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Bug"/>
            </td>
        </tr>
    </table>
</form>
