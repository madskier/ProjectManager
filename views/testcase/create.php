<LINK href="<?php echo URL; ?>styles/testcase.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Create a New Test Case</p>
<form id="fCreateTC" name="fCreateTC" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>testcase/ajaxInsert/">
    <table id="tbBasic">
        <tr>
            <td>
                <label id="lblTitle" for="txtTitle">Title</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtTitle" name="txtTitle" />
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
                <label id="lblRepro" for="txtaRepro">Reproduction Steps</label>
            </td>
            <td colspan="3">
                <textarea id="txtaRepro" name="txtaRepro" cols="" rows=""></textarea>  
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                <select id="ddProject" name="ddProject" onchange="getArea(this.value, null, null);">
                    <option value="" selected>Select a Project</option>
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area</label>
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
            <td colspan="4">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Test Case"/>
            </td>
        </tr>
    </table>  
</form>

