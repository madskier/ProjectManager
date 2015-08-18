<LINK href="<?php echo URL; ?>styles/testcase.css" rel="stylesheet" type="text/css">

<p id="pgTitle">View the Test Case</p>
<form id="fEditTC" name="fEditTC" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>testcase/ajaxUpdate/">
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
                <textarea id="txtaDescription" name="txtaDescription" cols="1" rows="1" disabled></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblRepro" for="txtaRepro">Reproduction Steps</label>
            </td>
            <td colspan="3">
                <textarea id="txtaRepro" name="txtaRepro" cols="" rows="" disabled></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                <select id="ddProject" name="ddProject" onchange="getArea(this.value, null, null);" disabled>
                    <option value="" selected>Select a Test Case First</option>
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area</label>
            </td>
            <td>
                <select id="ddArea" name="ddArea" disabled>
                    <option value="" selected>Select a Test Case First</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus" disabled>
                     <option value="" selected>Select a Test Case First</option>
                </select>
            </td>
            <td>
               <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label> 
            </td>
            <td>
               <select id="ddAssignedTo" name="ddAssignedTo" disabled>
                    <option value="" selected>Select a Test Case First</option>
                </select> 
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <a id="btnSubmit" class="aButton" href="<?php echo URL; ?>testcase/listTC">Return To List</a>
            </td>
        </tr>
    </table>    
</form>





