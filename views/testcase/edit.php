<LINK href="<?php echo URL; ?>styles/testcase.css" rel="stylesheet" type="text/css">
<div id="divTCSearch">
    <p id="pgTCSearch">Search for a Test Case</p>
    <select id="ddSearchProject" name="ddSearchProject" onchange="getTitles(this.value)">
        <option value="" selected>Select a Project</option>
    </select>
    <select id="ddSearchTitle" name="ddSearchTitle" onchange="getTCByID(this.value)">
        <option value="" selected>Select a Project First</option>
    </select>
</div>
<p id="pgTitle">Edit the Test Case</p>
<form id="fEditTC" name="fEditTC" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>testcase/ajaxUpdate/">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <table>
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
                    <option value="" selected>Select a Test Case First</option>
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area</label>
            </td>
            <td>
                <select id="ddArea" name="ddArea">
                    <option value="" selected>Select a Test Case First</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus">
                     <option value="" selected>Select a Test Case First</option>
                </select>
            </td>
            <td>
               <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label> 
            </td>
            <td>
               <select id="ddAssignedTo" name="ddAssignedTo">
                    <option value="" selected>Select a Test Case First</option>
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



