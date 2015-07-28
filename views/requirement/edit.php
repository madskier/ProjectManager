<LINK href="<?php echo URL; ?>styles/requirement.css" rel="stylesheet" type="text/css">
<div id="divReqSearch">
    <p id="pgReqSearch">Search for a Requirement</p>
    <select id="ddSearchProject" name="ddSearchProject" onchange="getTitles(this.value)">
        <option value="" selected>Select a Project</option>
    </select>
    <select id="ddSearchTitle" name="ddSearchTitle" onchange="getReqByID(this.value)">
        <option value="" selected>Select a Project First</option>
    </select>
</div>
<p id="pgTitle">Edit the Requirement</p>
<form id="fEditRequirement" name="fEditRequirement" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>requirement/ajaxUpdate/">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <table>
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
                 <textarea id="txtaDescription" name="txtaDescription" cols="1" rows="1" required></textarea>
            </td>
        </tr>
        <tr>
            <td>
                 <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                 <select id="ddProject" name="ddProject" onchange="">
                    <option value="" selected>Select a Requirement First</option>
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area Affected</label>
            </td>
            <td>
                <select id="ddArea" name="ddArea">
                    <option value="" selected>Select a Requirement First</option>
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

