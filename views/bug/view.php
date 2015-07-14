<LINK href="<?php echo URL; ?>styles/bug.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Bug Details</p>
<form id="fViewBug" method="post" name="fViewBug" enctype="application/x-www-form-urlencoded" action="">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <label id="lblTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle" disabled/>
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" name="txtaDescription" form="fEditBug" disabled></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" disabled>        
    </select>
    <label id="lblArea" for="ddArea" disabled>Area Affected</label>
    <select id="ddArea" name="ddArea" disabled>        
    </select>
    <label id="lblRepro" for="txtaRepro">Reproduction Steps</label>
    <textarea id="txtaRepro" name="txtaRepro" form="fEditBug" disabled></textarea>
    <label id="lblStatus" for="ddStatus">Status</label>
    <select id="ddStatus" name="ddStatus" disabled>               
    </select>
    <label id="lblPlatform" for="ddPlatform">Platform</label>
    <select id="ddPlatform" name="ddPlatform" disabled>       
    </select> 
    <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
    <select id="ddAssignedTo" name="ddAssignedTo" disabled>       
    </select>
    <a id="btnSubmit" href="<?php echo URL; ?>bug/listBug">Return To List</a>
</form>

