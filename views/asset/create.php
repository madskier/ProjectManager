<p id="pgTitle">Create a New Asset</p>
<form id="fCreateAsset" name="fCreateAsset" method="post" enctype="application/x-www-form-urlencoded" action="">
    <label id="lblTitle" for="txtTitle">Title</label>
    <input type="text" id="txtTitle" name="txtTitle"/>
    <label id="lblStatus" for="ddStatus">Status</label>
    <select id="ddStatus" name="ddStatus">
        <option value="Design" selected>Design</option>
        <option value="Concept Created">Concept Created</option>
        <option value="Ready for Review">Ready for Review</option>
        <option value="Finalized and Committed">Finalized and Committed</option>
        <option value="In Project">In Project</option>
        <option value="Deferred">Deferred</option>
    </select>
    <label id="lblType" for="ddType">Type</label>
    <select id="ddType" name="ddType">
        <option value="" selected>Select a Type</option>        
    </select>
    <select id="ddProject" name="ddProject">
        <option value="" selected>Select a Project</option>
    </select>
    <select id="ddAssignedTo" name="ddAssignedTo">
        <option value="" selected>Select a User</option>
    </select>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Create Asset(s)"/>
</form>

