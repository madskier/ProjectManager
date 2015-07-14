<LINK href="<?php echo URL; ?>styles/changeRequest.css" rel="stylesheet" type="text/css">

<div id="divCRSearch">
    <span id="spCRSearch">Search for a Change Request</span>
    <select id="ddSearchProject" name="ddSearchProject" onchange="getTitles(this.value)">
        <option value="" selected>Select a Project</option>
    </select>
    <select id="ddSearchTitle" name="ddSearchTitle" onchange="getCRByID(this.value)">
        <option value="" selected>Select a Project First</option>
    </select>
</div>
<p id="pgTitle">Edit the Change Request</p>
<form id="fEditCR" name="fEditCR" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>changerequest/ajaxUpdate/">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <label id="lblTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle" required/>
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" name="txtaDescription" cols="10" rows="10" form="fEditCR"></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" onchange="getArea(this.value, null, null)">
        <option value="" selected>Select a Change Request First</option>
    </select>
    <label id="lblArea" for="ddArea">Area Affected</label>
    <select id="ddArea" name="ddArea">
        <option value="" selected>Select a Change Request First</option>
    </select>    
    <label id="lblStatus" for="ddStatus">Status</label>
    <select id="ddStatus" name="ddStatus">
        <option value="" selected>Select a Change Request First</option>
    </select>
    <label id="lblPriority" for="ddPriority">Priority</label>
    <select id="ddPriority" name="ddPriority">
        <option value="" selected>Select a Change Request First</option>
    </select>
    <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
    <select id="ddAssignedTo" name="ddAssignedTo">
        <option value="" selected>Select a Change Request First</option>
    </select>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Save Changes"/>
</form>


