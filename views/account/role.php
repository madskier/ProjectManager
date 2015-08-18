<LINK href="<?php echo URL; ?>styles/changePassword.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Request a Role</p>
<form id="fRequestRole" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>account/requestRole/">
    <table id="tbBasic">        
        <tr>
            <td>
                <label id="lblCurrentRole" for="txtCurrent">Current Role</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtCurrent" name="txtCurrent" disabled/>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblRole" for="ddNewRole">New Role</label>
            </td>
            <td colspan="3">
                <select id="ddNewRole" name="ddNewRole">
                    <option value="">Select a Role</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Request Role"/>
            </td>
        </tr>
    </table>   
</form>

