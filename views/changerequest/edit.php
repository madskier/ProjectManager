<LINK href="<?php echo URL; ?>styles/changeRequest.css" rel="stylesheet" type="text/css">

<div id="divCRSearch">
    <p id="pgCRSearch">Search for a Change Request</p>
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
    <table>
        <tr>
            <td>
                <label id="lblTitle" for="txtTitle">Title</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtTitle" name="txtTitle" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblDescription" for="txtaDescription">Description</label>
            </td>
            <td colspan="3">
                <textarea id="txtaDescription" name="txtaDescription" cols="10" rows="10" form="fEditCR"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                <select id="ddProject" name="ddProject" onchange="getArea(this.value, null, null)">
                    <option value="" selected>Select a Change Request First</option>
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area Affected</label>
            </td>
            <td>
                <select id="ddArea" name="ddArea">
                    <option value="" selected>Select a Change Request First</option>
                </select>   
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblPriority" for="ddPriority">Priority</label>
            </td>
            <td>
                <select id="ddPriority" name="ddPriority">
                    <option value="" selected>Select a Change Request First</option>
                </select>
            </td>
            <td>
                <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus">
                    <option value="" selected>Select a Change Request First</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
            </td>
            <td>
                <select id="ddAssignedTo" name="ddAssignedTo">
                    <option value="" selected>Select a Change Request First</option>
                </select>
            </td>
            <td>
                <label id="lblRequstedBy" for="ddRequestedBy">Requested By: </label>
            </td>
            <td>
                <select id="ddRequestedBy" name="ddRequestedBy">
                    <option value="" selected>Select an Informant</option>
                </select>
            </td>
        </tr>
          <tr>
            <td>
                <label id="lblApproach" for="txtaApproach">Intended Approach: </label>
            </td>
            <td colspan="3">                
                <textarea id="txtaApproach" name="txtaApproach" cols="1" rows="1" form="fCreateCR"></textarea>                
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblQuestions" for="txtaQuestions">Questions: </label>
            </td>
            <td colspan="3">                
                <textarea id="txtaQuestions" name="txtaQuestions" cols="1" rows="1" form="fCreateCR"></textarea>                
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblTime" for="txtTime">Completion Time: </label>
            </td>
            <td colspan="2">
                <input type="number" id="txtTime" name="txtTime"/>
            </td>            
            <td>
                <select id="ddTime" name="ddTime">
                </select>
            </td>
        </tr>
        <tr>
            <td>
                 <label id="lblReqMap" for="mlReqMap">Map Requirements: </label>
            </td>
            <td colspan="3">
                <select id="mlReqMap" name="mlReqMap[]" multiple>                    
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Save Changes"/>
            </td>
        </tr>
    </table>  
    
    
</form>


