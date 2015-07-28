<!doctype html>
<html>
<head lang="en">
    <meta charset="UTF-8">    
    <LINK href="<?php echo URL; ?>styles/main.css" rel="stylesheet" type="text/css">
    <script src="<?php echo URL; ?>scripts/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>scripts/common.js" type="text/javascript"></script>
    <?php
        if (isset($this->js))
        {
            foreach ($this->js as $js)
            {
                echo '<script src="'.URL.'views/'.$js.'" type="text/javascript"></script>';                
            }            
        }
    ?>
</head>
<body class="text">
    <div class="top-background">
        <div id="wsbnavbar1">
            <ul class="navstyle">
                <li>
                    <div class="hex">
                        <div class="topHex"></div>
                        <div class="middleHex">
                            <a class="listitem" href="#"><span class="mainitem">Design</span></a>
                        </div>
                        <div class="bottomHex"></div>
                    </div>                
                    <ul>
                        <li>
                            <div class="hex firstsub">
                                <div class="topHex firstsub"></div>
                                <div class="middleHex firstsub">
                                    <a class="sub-first sf-with-ul" href="<?php echo URL; ?>changerequest/listCR">Change Request</a>
                                </div>
                                <div class="bottomHex firstsub"></div>
                            </div>                        
                            <ul>
                                <li>
                                    <div class="hex firstsub first">
                                        <div class="topHex firstsub first"></div>
                                        <div class="middleHex firstsub first">
                                            <a class="sub-first" href="<?php echo URL; ?>changerequest/create">Create</a>
                                        </div>
                                        <div class="bottomHex firstsub first"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex firstsub second">
                                        <div class="topHex firstsub second"></div>
                                        <div class="middleHex firstsub second">
                                            <a class="sub-first" href="<?php echo URL; ?>changerequest/edit/0">Edit</a>
                                        </div>
                                        <div class="bottomHex firstsub second"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex firstsub third">
                                        <div class="topHex firstsub third"></div>
                                        <div class="middleHex firstsub third">
                                            <a class="sub-first" href="<?php echo URL; ?>changerequest/listCR">List</a>
                                        </div>
                                        <div class="bottomHex firstsub third"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="hex secondsub">
                                <div class="topHex secondsub"></div>
                                <div class="middleHex secondsub">
                                    <a class="sub-last sf-with-ul" href="<?php echo URL; ?>requirement/listReq">Requirement</a>
                                </div>
                                <div class="bottomHex secondsub"></div>
                            </div>                        
                            <ul>
                                <li>
                                    <div class="hex secondsub first">
                                        <div class="topHex secondsub first"></div>
                                        <div class="middleHex secondsub first">
                                            <a class="sub-first" href="<?php echo URL; ?>requirement/create">Create</a>
                                        </div>
                                        <div class="bottomHex firstsub first"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex secondsub second">
                                        <div class="topHex secondsub second"></div>
                                        <div class="middleHex secondsub second">
                                            <a class="sub-first" href="<?php echo URL; ?>requirement/edit/0">Edit</a>
                                        </div>
                                        <div class="bottomHex secondsub second"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex secondsub third">
                                        <div class="topHex secondsub third"></div>
                                        <div class="middleHex secondsub third">
                                            <a class="sub-first" href="<?php echo URL; ?>requirement/listReq">List</a>
                                        </div>
                                        <div class="bottomHex secondsub third"></div>
                                    </div>                                
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="hex">
                        <div class="topHex"></div>
                        <div class="middleHex">
                            <a class="listitem" href=""><span class="mainitem">Develop</span></a>
                        </div>
                        <div class="bottomHex"></div>
                    </div>                
                    <ul>
                        <li>
                            <div class="hex firstsub">
                                <div class="topHex firstsub"></div>
                                <div class="middleHex firstsub">
                                    <a class="sub-first sf-with-ul" href="<?php echo URL; ?>asset/listAsset">Asset</a>
                                </div>
                                <div class="bottomHex firstsub"></div>
                            </div>                        
                            <ul>
                                <li>
                                    <div class="hex firstsub first">
                                        <div class="topHex firstsub first"></div>
                                        <div class="middleHex firstsub first">
                                            <a class="sub-first" href="<?php echo URL; ?>asset/create">Create</a>
                                        </div>
                                        <div class="bottomHex firstsub first"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex firstsub second">
                                        <div class="topHex firstsub second"></div>
                                        <div class="middleHex firstsub second">
                                            <a class="sub-first" href="<?php echo URL; ?>asset/edit/0">Edit</a>
                                        </div>
                                        <div class="bottomHex firstsub second"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex firstsub third">
                                        <div class="topHex firstsub third"></div>
                                        <div class="middleHex firstsub third">
                                            <a class="sub-first" href="<?php echo URL; ?>asset/listAsset">List</a>
                                        </div>
                                        <div class="bottomHex firstsub third"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="hex secondsub">
                                <div class="topHex secondsub"></div>
                                <div class="middleHex secondsub">
                                    <a class="sub-last sf-with-ul" href="<?php echo URL; ?>project/listProject">Project</a>
                                </div>
                                <div class="bottomHex secondsub"></div>
                            </div>                        
                            <ul>
                                <li>
                                    <div class="hex secondsub first">
                                        <div class="topHex secondsub first"></div>
                                        <div class="middleHex secondsub first">
                                            <a class="sub-first" href="<?php echo URL; ?>project/create">Create</a>
                                        </div>
                                        <div class="bottomHex firstsub first"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex secondsub second">
                                        <div class="topHex secondsub second"></div>
                                        <div class="middleHex secondsub second">
                                            <a class="sub-first" href="<?php echo URL; ?>project/edit/0">Edit</a>
                                        </div>
                                        <div class="bottomHex secondsub second"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex secondsub third">
                                        <div class="topHex secondsub third"></div>
                                        <div class="middleHex secondsub third">
                                            <a class="sub-first" href="<?php echo URL; ?>project/listProject">List</a>
                                        </div>
                                        <div class="bottomHex secondsub third"></div>
                                    </div>                                
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="hex">
                        <div class="topHex"></div>
                        <div class="middleHex">
                            <a class="listitem" href=""><span class="mainitem">Test</span></a>
                        </div>
                        <div class="bottomHex"></div>
                    </div>                
                    <ul>
                        <li>
                            <div class="hex firstsub">
                                <div class="topHex firstsub"></div>
                                <div class="middleHex firstsub">
                                    <a class="sub-first sf-with-ul" href="<?php echo URL; ?>bug/listBug">Bug</a>
                                </div>
                                <div class="bottomHex firstsub"></div>
                            </div>                        
                            <ul>
                                <li>
                                    <div class="hex firstsub first">
                                        <div class="topHex firstsub first"></div>
                                        <div class="middleHex firstsub first">
                                            <a class="sub-first" href="<?php echo URL; ?>bug/create">Create</a>
                                        </div>
                                        <div class="bottomHex firstsub first"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex firstsub second">
                                        <div class="topHex firstsub second"></div>
                                        <div class="middleHex firstsub second">
                                            <a class="sub-first" href="<?php echo URL; ?>bug/edit/0">Edit</a>
                                        </div>
                                        <div class="bottomHex firstsub second"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex firstsub third">
                                        <div class="topHex firstsub third"></div>
                                        <div class="middleHex firstsub third">
                                            <a class="sub-first" href="<?php echo URL; ?>bug/listBug">List</a>
                                        </div>
                                        <div class="bottomHex firstsub third"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="hex secondsub">
                                <div class="topHex secondsub"></div>
                                <div class="middleHex secondsub">
                                    <a class="sub-last sf-with-ul" href="<?php echo URL; ?>testcase/listTC">Test Case</a>
                                </div>
                                <div class="bottomHex secondsub"></div>
                            </div>                        
                            <ul>
                                <li>
                                    <div class="hex secondsub first">
                                        <div class="topHex secondsub first"></div>
                                        <div class="middleHex secondsub first">
                                            <a class="sub-first" href="<?php echo URL; ?>testcase/create">Create</a>
                                        </div>
                                        <div class="bottomHex firstsub first"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex secondsub second">
                                        <div class="topHex secondsub second"></div>
                                        <div class="middleHex secondsub second">
                                            <a class="sub-first" href="<?php echo URL; ?>testcase/edit/0">Edit</a>
                                        </div>
                                        <div class="bottomHex secondsub second"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="hex secondsub third">
                                        <div class="topHex secondsub third"></div>
                                        <div class="middleHex secondsub third">
                                            <a class="sub-first" href="<?php echo URL; ?>testcase/listTC">List</a>
                                        </div>
                                        <div class="bottomHex secondsub third"></div>
                                    </div>                                
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="hex">
                        <div class="topHex"></div>
                        <div class="middleHex">
                            <a class="listitem" href="<?php echo URL; ?>dashboard/index"><span class="mainitem">Tools</span></a>
                        </div>
                        <div class="bottomHex"></div>
                    </div>                
                </li>
            </ul>
        </div>
        <div id="divLogButton">
            <button type="button" id="btnLogOut" onclick="location.href='<?php echo URL; ?>dashboard/logout'">Log Out</button>
        </div>
    </div>    
    <div id="maincontent" class="maincontent">
