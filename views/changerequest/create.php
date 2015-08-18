<LINK href="<?php echo URL; ?>styles/changeRequest.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Create a New Change Request</p>
<form id="fCreateCR" name="fCreateCR" method="post" enctype="multipart/form-data" action="<?php echo URL; ?>changerequest/ajaxInsert/">
    <table id="tbBasic">
        <tr>
            <td>
                 <label id="lblTitle" for="txtTitle">Title: * </label>
            </td>
            <td colspan="3">
                <input type="text" id="txtTitle" name="txtTitle" required/>
            </td>            
        </tr>
        <tr>
            <td>
                <label id="lblDescription" for="txtaDescription">Description: </label>
            </td>
            <td colspan="3">
                <textarea id="txtaDescription" name="txtaDescription" cols="1" rows="1" form="fCreateCR"></textarea>
            </td>            
        </tr>
        <tr>
            <td>
                <label id="lblProject" for="ddProject">Project: *</label>
            </td>
            <td>
                <select id="ddProject" name="ddProject" onchange="getReqsAndArea(this.value)" required>
                    <option value="" selected>Select a Project</option>
                </select>
            </td>
            <td>
                 <label id="lblArea" for="ddArea">Area Affected: </label>
            </td>
            <td>
                <select id="ddArea" name="ddArea">
                    <option value="" selected>Select a Project First</option>
                </select> 
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblPriority" for="ddPriority">Priority: </label>
            </td>
            <td>
                <select id="ddPriority" name="ddPriority">
                    <option value="" selected>Select a Priority</option>
                    <option value="Urgent">Urgent</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
            </td>
            <td>
                 <label id="lblStatus" for="ddStatus">Status: *</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus" required>
                    <option value="" selected>Select a Status</option>
                    <option value="Design">Design</option>
                    <option value="Approved">Approved By Client</option>
                    <option value="Implementing">Implementing</option>        
                </select> 
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblAssignedTo" for="ddAssignedTo">Assigned To: </label>
            </td>
            <td>
                <select id="ddAssignedTo" name="ddAssignedTo">
                    <option value="" selected>Select a User</option>
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
            <td colspan="2">
                 <button type="button" id="btnShowDetail" onclick="showDetail()">Show Details</button>
            </td>
            <td colspan="2">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Create"/>
            </td>
        </tr>
    </table>   
    <table id="tbDetail">
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
                <label id="lblTime" for="txtaTime">Completion Time: </label>
            </td>
            <td colspan="2">
                <input type="number" id="txtTime" name="txtTime"/>
            </td>            
            <td>
                <select id="ddTime" name="ddTime">
                    <option value="Hours">Hours</option>
                    <option value="Days">Days</option>
                    <option value="Weeks">Weeks</option>
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
            <td>
                <label id="lblUpload" for="fuLoader">File Upload:</label>
            </td>
            <td>
                <input type="file" id="fuLoader" name="fuLoader"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                 <button type="button" id="btnHideDetail" onclick="hideDetail()">Hide Details</button>
            </td>
            <td colspan="2">
                <input type="submit" id="btnSubmitDetail" name="btnSubmitDetail" value="Create"/>
            </td>
        </tr>
    </table>
</form>
