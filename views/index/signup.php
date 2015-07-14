<LINK href="styles/signup.css" rel="stylesheet" type="text/css">
<div id="formDiv" class="center">
    <form id="fSignup" name="fSignup" method="post" enctype="application/x-www-form-urlencoded" action="index/addUser">
        <span id="spPageTitle" class="heading1">Create Account</span>
        <table>
            <tr>
                <td>
                    <input type="text" id="txtFullName" name="txtFullName" placeholder="Full Name" alt="Full Name" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" id="txtUsername" name="txtUsername" placeholder="Username" alt="Username" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" alt="Password" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Confirm Password" alt="Confirm Password" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Email" alt="Email" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" id="submitButton" name="submitButton" value="Create Account" alt="Create Account"/>
                </td>
            </tr>            
        </table>
    </form>    
</div>

