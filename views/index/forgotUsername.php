<LINK href="<?php echo URL; ?>styles/login.css" rel="stylesheet" type="text/css">
<LINK href="<?php echo URL; ?>styles/forgotCredentials.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="<?php echo URL; ?>images/favicon.png">
<HEADER class="center" lang="en">   
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?php echo URL; ?>scripts/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>scripts/common.js" type="text/javascript"</script>
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
    <p class="font">Retrieve Username</p>
</HEADER>
<div id="formDiv" class="center">
    <form id="fUsername" name="fUsername" method="post" enctype="application/x-www-form-urlencoded" action="<?php echo URL; ?>index/getUsername">
        <div class="hex-row">
            <div class="hex">
                <div class="topHex"></div>
                <div class="middleHex">                    
                    <input type="email" id="txtEmailOnly" name="txtEmailOnly" placeholder="Email" alt="Email associated with account" />
                    <input type="submit" id="submitButton" name="submitButton" value="Get Username" alt="Get Username"/>
                </div>
                <div class="bottomHex"></div>
            </div>
            <div class="hex-row even">
                <div class="hex">
                    <div class="topHex"></div>
                    <div class="middleHex"></div>
                    <div class="bottomHex"></div>
                </div>
                <div class="hex rightHex short">
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

