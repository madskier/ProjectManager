<LINK href="<?php echo URL; ?>styles/testcase.css" rel="stylesheet" type="text/css">
<div id="divTCSearch">
    <span id="spTCSearch">Search for a Test Case</span>
    <select id="ddSearchProject" name="ddSearchProject" onchange="getTitles(this.value)">
        <option value="" selected>Select a Project</option>
    </select>
    <select id="ddSearchTitle" name="ddSearchTitle" onchange="getTCByID(this.value)">
        <option value="" selected>Select a Project First</option>
    </select>
</div>
<form id="fCreateTC" name="fEditTC" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>testcase/ajaxUpdate/">
    <label id="lblTitle" for="txtTitle">Name</label>
    <input type="text" id="txtTitle" name="txtTitle" />
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" name="txtaDescription" cols="1" rows="1"></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" onchange="getArea(this.value, null, null);">
        <option value="" selected>Select a Project</option>
    </select>
    <label id="lblArea" for="ddArea">Area</label>
    <select id="ddArea" name="ddArea">
        <option value="" selected>Select a Project First</option>
    </select>
    <label id="lblStatus" for="ddStatus">Status</label>
    <select id="ddStatus" name="ddStatus">
    </select>
    <label id="lblRepro" for="txtaRepro">Reproduction Steps</label>
    <textarea id="txtaRepro" name="txtaRepro" cols="" rows=""></textarea>
    <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
    <select id="ddAssignedTo" name="ddAssignedTo">
        <option value="" selected>Select a User</option>
    </select>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Save Changes"/>
</form>



