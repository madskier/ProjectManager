<LINK href="<?php echo URL; ?>styles/changeRequest.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Create a New Change Request</p>
<form id="fCreateCR" name="fCreateCR" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>changerequest/ajaxInsert/">
    <label id="lblTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle" required/>
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" name="txtaDescription" cols="10" rows="10" form="fCreateCR"></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" onchange="getArea(this.value, null, null)">
        <option value="" selected>Select a Project</option>
    </select>
    <label id="lblArea" for="ddArea">Area Affected</label>
    <select id="ddArea" name="ddArea">
        <option value="" selected>Select a Project First</option>
    </select>    
    <label id="lblStatus" for="ddStatus">Status</label>
    <select id="ddStatus" name="ddStatus">
        <option value="" selected>Select a Status</option>
        <option value="Design">Design</option>
        <option value="Approved">Approved</option>
        <option value="Implementing">Implementing</option>
        <option value="Ready For Test">Ready For Test</option>
        <option value="Testing">Testing</option>
        <option value="Closed">Closed</option>
        <option value="Deferred">Deferred</option>
    </select>
    <label id="lblPriority" for="ddPriority">Priority</label>
    <select id="ddPriority" name="ddPriority">
        <option value="" selected>Select a Priority</option>
        <option value="Urgent">Urgent</option>
        <option value="High">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
    </select>
    <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
    <select id="ddAssignedTo" name="ddAssignedTo">
        <option value="" selected>Select a User</option>
    </select>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Change Request"/>
</form>
