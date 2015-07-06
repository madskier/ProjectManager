<LINK href="<?php echo URL; ?>styles/bug.css" rel="stylesheet" type="text/css">
<div id="divBugSearch">
    <span id="spBugSearch">Search for a Bug</span>
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
    <label id="lblTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle" required/>
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" name="txtaDescription" form="fEditBug"></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" onchange="">
        <option value="" selected>Select a Bug First</option>
    </select>
    <label id="lblArea" for="ddArea">Area Affected</label>
    <select id="ddArea" name="ddArea">
        <option value="" selected>Select a Bug First</option>
    </select>
    <label id="lblRepro" for="txtaRepro">Reproduction Steps</label>
    <textarea id="txtaRepro" name="txtaRepro" form="fEditBug" required></textarea>
    <label id="lblStatus" for="ddStatus">Status</label>
    <select id="ddStatus" name="ddStatus">
        <option value="" selected>Select a Bug First</option>        
    </select>
    <label id="lblPlatform" for="ddPlatform">Platform</label>
    <select id="ddPlatform" name="ddPlatform">]
        <option value="" selected>Select a Bug First</option>
    </select> 
    <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
    <select id="ddAssignedTo" name="ddAssignedTo">
        <option value="" selected>Select a User</option>
    </select>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Save Changes"/>
</form>
