<LINK href="<?php echo URL; ?>styles/bug.css" rel="stylesheet" type="text/css">
<p id="pgTitle">View Bug</p>
<form id="fEditBug" method="post" name="fEditBug" enctype="application/x-www-form-urlencoded" action="">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <table>
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
                <label id="lblDescription" for="txtaDescription">Description</label>
            </td>
            <td colspan="3">
                <textarea id="txtaDescription" name="txtaDescription" form="fEditBug" disabled></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                 <select id="ddProject" name="ddProject" disabled>
                    <option value="" selected>Select a Bug First</option>
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area Affected</label>
            </td>
            <td>
                <select id="ddArea" name="ddArea" disabled>
                    <option value="" selected>Select a Bug First</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblRepro" for="txtaRepro">Reproduction Steps</label>
            </td>
            <td colspan="3">
                <textarea id="txtaRepro" name="txtaRepro" form="fEditBug" disabled></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus" disabled>
                    <option value="" selected>Select a Bug First</option>        
                </select>
            </td>
            <td>
                <label id="lblPlatform" for="ddPlatform">Platform</label>
            </td>
            <td>
                <select id="ddPlatform" name="ddPlatform" disabled>
                    <option value="" selected>Select a Bug First</option>
                </select>  
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label> 
            </td>
            <td colspan="3">
                <select id="ddAssignedTo" name="ddAssignedTo" disabled>
                    <option value="" selected>Select a User</option>
                </select> 
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblTime" for="txtTime">Completion Time: </label>
            </td>
            <td colspan="2">
                <input type="number" id="txtTime" name="txtTime" disabled/>
            </td>            
            <td>
                <select id="ddTime" name="ddTime" disabled>                  
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <a id="btnSubmit" class="aButton" href="<?php echo URL; ?>bug/listBug">Return To List</a>
            </td>
        </tr>
    </table>   
</form>

