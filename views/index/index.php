<LINK href="<?php echo URL; ?>styles/login.css" rel="stylesheet" type="text/css">
<HEADER class="center" lang="en">   
    <meta charset="UTF-8">    
    <script src="<?php echo URL; ?>scripts/jquery-2.1.4.min.js" type="text/javascript"></script>
    <?php
        if (isset($this->js))
        {
            foreach ($this->js as $js)
            {
                echo '<script src="'.URL.'views/'.$js.'" type="text/javascript"></script>';
            }
        }
    ?>
    <p class="titleFont">codecycle</p>
    <p class="font">Design | Develop | Test | Repeat</p>
</HEADER>
<div id="formDiv" class="center">
    <form id="fLogin" name="fLogin" method="post" enctype="application/x-www-form-urlencoded" action="index/doLogin">
        <div class="hex-row">
            <div class="hex">
                <div class="topHex"></div>
                <div class="middleHex">
                    <input type="text" id="txtUsername" name="txtUsername" placeholder="Username" alt="Username" required />
                    <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" alt="Password" required />
                    <input type="submit" id="submitButton" name="submitButton" value="Log In" alt="Log In"/>
                </div>
                <div class="bottomHex"></div>
            </div>
            <div class="hex-row even">
                <div class="hex">
                    <div class="topHex"></div>
                    <div class="middleHex">
                        <button type="button" id="btnForgotUser" onclick="location.href='<?php echo URL; ?>index/forgotUsername'">Forgot Username</button>
                        <button type="button" id="btnForgotPass" onclick="location.href='<?php echo URL; ?>index/forgotPassword'">Forgot Password</button>
                    </div>
                    <div class="bottomHex"></div>
                </div>
                <div class="hex rightHex">
                    <div id="signUpDiv" class="topHex"></div>
                    <div class="middleHex">
                        <button type="button" id="btnSignUp" onclick="changeLogin()">Sign Up</button>           
                    </div>
                <div class="bottomHex"></div>
                </div>            
            </div>
        </div>

    </form>
    <form id="fSignUp" name="fSignUp" method="post" enctype="application/x-www-form-urlencoded" action="index/doSignUp">
        <div class="hex-row">
            <div class="hex">
                <div class="topHex"></div>
                <div class="middleHex">
                    <input type="text" id="txtUsernameSignUp" name="txtUsernameSignUp" placeholder="Username" alt="Username" required />
                    <input type="password" id="txtPasswordSignUp" name="txtPasswordSignUp" placeholder="Password" alt="Password" required />
                    <input type="password" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Confirm Password" alt="Confirm Password" required />            
                </div>   
                <div class="bottomHex"></div>
            </div>
            <div class="hex-row even">
                <div class="hex">
                    <div class="topHex"></div>
                    <div class="middleHex">
                        <input type="text" id="txtName" name="txtName" placeholder="Full Name" alt="Full Name" required />
                        <input type="email" id="txtEmail" name="txtEmail" placeholder="Email" alt="Email" required />
                        <input type="submit" id="submitButton" name="submitButton" value="Sign Up" alt="Sign Up"/>
                    </div> 
                    <div class="bottomHex"></div>
                </div>
                <div class="hex rightHex signupmobile">
                    <div id="signUpDiv" class="topHex"></div>
                    <div class="middleHex">
                        <button id="btnLogin" onclick="changeSignUp()">Back to Login</button>           
                    </div>
                    <div class="bottomHex"></div>
                </div>
            </div>
        </div>               
    </form>    
</div>




