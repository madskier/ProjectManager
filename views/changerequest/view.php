<LINK href="<?php echo URL; ?>styles/changeRequest.css" rel="stylesheet" type="text/css">
<p id="pgTitle">View Change Request</p>
<form id="fEditCR" name="fEditCR" method="post" enctype="application/x-www-form-urlencoded" action="">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <label id="lblTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle" disabled/>
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" name="txtaDescription" cols="10" rows="10" form="fEditCR" disabled></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" disabled>        
    </select>
    <label id="lblArea" for="ddArea">Area Affected</label>
    <select id="ddArea" name="ddArea" disabled>        
    </select>    
    <label id="lblStatus" for="ddStatus">Status</label>
    <select id="ddStatus" name="ddStatus" disabled>        
    </select>
    <label id="lblPriority" for="ddPriority">Priority</label>
    <select id="ddPriority" name="ddPriority" disabled>        
    </select>
    <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
    <select id="ddAssignedTo" name="ddAssignedTo" disabled>        
    </select>
    <a id="btnSubmit" href="<?php echo URL; ?>changerequest/listCR">Return To List</a>
</form>

