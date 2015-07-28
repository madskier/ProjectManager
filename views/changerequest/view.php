<LINK href="<?php echo URL; ?>styles/changeRequest.css" rel="stylesheet" type="text/css">
<p id="pgTitle">View Change Request</p>
<form id="fEditCR" name="fEditCR" method="post" enctype="application/x-www-form-urlencoded" action="">
    <input type="hidden" id="hdnID" name="hdnID"/>
    <table>
        <tr>
            <td>
                <label id="lblTitle" for="txtTitle">Title</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtTitle" name="txtTitle" disabled/>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblDescription" for="txtaDescription">Description</label>
            </td>
            <td colspan="3">
                <textarea id="txtaDescription" name="txtaDescription" cols="10" rows="10" form="fEditCR" disabled></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblProject" for="ddProject">Project</label>
            </td>
            <td>
                <select id="ddProject" name="ddProject" disabled>                    
                </select>
            </td>
            <td>
                <label id="lblArea" for="ddArea">Area Affected</label>
            </td>
            <td>
                <select id="ddArea" name="ddArea" disabled>                   
                </select>   
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblPriority" for="ddPriority">Priority</label>
            </td>
            <td>
                <select id="ddPriority" name="ddPriority" disabled>                    
                </select>
            </td>
            <td>
                <label id="lblStatus" for="ddStatus">Status</label>
            </td>
            <td>
                <select id="ddStatus" name="ddStatus" disabled>                    
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblAssignedTo" for="ddAssignedTo">Assigned To</label>
            </td>
            <td colspan="3">
                <select id="ddAssignedTo" name="ddAssignedTo" disabled>                    
                </select>
            </td>
        </tr>
          <tr>
            <td>
                <label id="lblApproach" for="txtaApproach">Intended Approach: </label>
            </td>
            <td colspan="3">                
                <textarea id="txtaApproach" name="txtaApproach" cols="1" rows="1" form="fCreateCR" disabled></textarea>                
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblQuestions" for="txtaQuestions">Questions: </label>
            </td>
            <td colspan="3">                
                <textarea id="txtaQuestions" name="txtaQuestions" cols="1" rows="1" form="fCreateCR" disabled></textarea>                
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblTime" for="txtTime">Completion Time: </label>
            </td>
            <td colspan="2">
                <input type="number" id="txtTime" name="txtTime" disabled/>
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
                <select id="mlReqMap" name="mlReqMap[]" multiple disabled>                    
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <a id="btnSubmit" href="<?php echo URL; ?>changerequest/listCR">Return To List</a>
            </td>
        </tr>
    </table>    
</form>

