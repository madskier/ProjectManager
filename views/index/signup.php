<LINK href="styles/login.css" rel="stylesheet" type="text/css">
<HEADER class="center">
    <img src="images/homeLogo.png"/>
</HEADER>
<div id="formDiv" class="center">
    <form id="fLogin" name="fSignup" method="post" enctype="application/x-www-form-urlencoded" action="index/doLogin">
        <span id="spPageTitle" class="heading1">Login</span>
        <table>
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
                    <input type="submit" id="submitButton" name="submitButton" value="Log In" alt="Log In"/>
                </td>
            </tr>
            <tr>
                <td class="cell">
                    <a href="forgotPassword.html">Forgot Username</a>
                </td>
                <td class="cell">
                    <a href="forgotPassword.html">Forgot Password</a>
                </td>
            </tr>
        </table>
    </form>
    <p>Don't have an account? <a href="newAccount.html">Sign up here &gt;&gt;</a></p>
</div>

