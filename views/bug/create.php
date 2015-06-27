<LINK href="<?php echo URL; ?>styles/bug.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Create a New Bug</p>
<form id="fCreateBug" name="fCreateBug" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>bug/ajaxInsert/">
    <label id="lblTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle" required/>
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" cols="1" rows="1"></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" onchange="populateArea(this.value)">
        <option value="" selected>Select a Project</option>
    </select>
    <label id="lblArea" for="ddArea">Area Affected</label>
    <select id="ddArea" name="ddArea">
        <option value="" selected>Select a Project First</option>
    </select>
    <label id="lblRepro" for="txtaRepro">Reproduction Steps</label>
    <textarea id="txtaRepro" name="textaRepro" cols="1" rows="1" required></textarea>
    <label id="lblStatus" for="ddStatus">Status</label>
    <select id="ddStatus" name="ddStatus">
        <option value="Unverified" selected>New - Unverified</option>
        <option value="Verified">New - Verified by Test Team</option>        
    </select>
    <label id="lblPlatform" for="ddPlatform">Platform</label>
    <select id="ddPlatform" name="ddPlatform">
        <option value="" selected>Select a Platform</option>
    </select>
    <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
    <select id="ddAssignedTo" name="ddAssignedTo">
        <option value="" selected>Select a User</option>
    </select>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Bug"/>
</form>
<div id="listInserts"></div>
