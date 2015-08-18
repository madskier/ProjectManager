<LINK href="<?php echo URL; ?>styles/changePassword.css" rel="stylesheet" type="text/css">
<p id="pgTitle">Change Your Password</p>
<form id="fChangePassword" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>account/changePassword/">
    <table id="tbBasic">
        <tr>
            <td>
                <label id="lblCurrent" for="txtCurrent">Current Password</label>
            </td>
            <td colspan="3">
                <input type="text" id="txtCurrent" name="txtCurrent"/>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblNew" for="txtNew">New Password</label>                
            </td>
            <td colspan="3">
                <input type="password" id="txtNew" name="txtNew"/>
            </td>
        </tr>
        <tr>
            <td>
                <label id="lblConfirm" for="txtConfirm">Confirm New Password</label>                
            </td>
            <td colspan="3">
                <input type="password" id="txtConfirm" name="txtConfirm"/>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Change Password"/>
            </td>
        </tr>
    </table>   
</form>

