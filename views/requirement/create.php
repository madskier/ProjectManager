<LINK href="<?php echo URL; ?>styles/requirement.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Create a New Requirement</p>
<form id="fCreateRequirement" name="fCreateRequirement" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>requirement/ajaxInsert/">
    <label id="lblReqTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle" required/>
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" name="txtaDescription" cols="1" rows="1" required></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" onchange="getArea(this.value, null, null)">
        <option value="" selected>Select a Project</option>
    </select>
    <label id="lblArea" for="ddArea">Area Affected</label>
    <select id="ddArea" name="ddArea">
        <option value="" selected>Select a Project First</option>
    </select>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Requirement"/>    
</form>
