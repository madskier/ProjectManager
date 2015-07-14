<LINK href="<?php echo URL; ?>styles/requirement.css" rel="stylesheet" type="text/css">
<p id="pgTitle">View Requirement</p>
<form id="fViewRequirement" name="fViewRequirement" method="post" enctype="application/x-www-form-urlencoded" action="">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <label id="lblReqTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle" disabled/>
    <label id="lblDescription" for="txtaDescription">Description</label>
    <textarea id="txtaDescription" name="txtaDescription" cols="1" rows="1" disabled></textarea>
    <label id="lblProject" for="ddProject">Project</label>
    <select id="ddProject" name="ddProject" disabled>        
    </select>
    <label id="lblArea" for="ddArea">Area Affected</label>
    <select id="ddArea" name="ddArea" disabled>        
    </select>
    <a id="btnSubmit" href="<?php echo URL; ?>requirement/listReq">Return To List</a>    
</form>


