<LINK href="<?php echo URL; ?>styles/requirement.css" rel="stylesheet" type="text/css">
<div id="divBugSearch">
    <span id="spReqSearch">Search for a Requirement</span>
    <select id="ddSearchProject" name="ddSearchProject" onchange="getTitles(this.value)">
        <option value="" selected>Select a Project</option>
    </select>
    <select id="ddSearchTitle" name="ddSearchTitle" onchange="getReqByID(this.value)">
        <option value="" selected>Select a Project First</option>
    </select>
</div>
<p id="pgTitle">Edit the Requirement</p>
<form id="fEditRequirement" name="fCreateRequirement" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>requirement/ajaxUpdate/">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <label id="lblReqTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle" required/>
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" name="txtaDescription" cols="1" rows="1" required></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" onchange="">
        <option value="" selected>Select a Requirement First</option>
    </select>
    <label id="lblArea" for="ddArea">Area Affected</label>
    <select id="ddArea" name="ddArea">
        <option value="" selected>Select a Requirement First</option>
    </select>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Save Changes"/>    
</form>

