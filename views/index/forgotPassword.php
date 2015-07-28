<LINK href="<?php echo URL; ?>styles/login.css" rel="stylesheet" type="text/css">
<LINK href="<?php echo URL; ?>styles/forgotCredentials.css" rel="stylesheet" type="text/css">
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
    <p class="font">Retrieve Password</p>
</HEADER>
<div id="formDiv" class="center">
    <form id="fPassword" name="fLogin" method="post" enctype="application/x-www-form-urlencoded" action="index/getPassword">
        <div class="hex-row">
            <div class="hex">
                <div class="topHex"></div>
                <div class="middleHex">
                    <input type="text" id="txtUsername" name="txtUsername" placeholder="Username" alt="Username associated with account" />
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Email" alt="Email associated with account" />
                    <input type="submit" id="submitButton" name="submitButton" value="Get Password" alt="Get Password"/>
                </div>
                <div class="bottomHex"></div>
            </div>
            <div class="hex-row even">
                <div class="hex empty">
                    <div class="topHex"></div>
                    <div class="middleHex"></div>
                    <div class="bottomHex"></div>
                </div>
                <div class="hex rightHex">
                    <div id="signUpDiv" class="topHex"></div>
                    <div class="middleHex">
                        <button type="button" id="btnNavLogin" onclick="navToLogin()">Back To Login</button>           
                    </div>
                    <div class="bottomHex"></div>
                </div>            
            </div>
        </div>
    </form>
</div>
