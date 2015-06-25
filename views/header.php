<!doctype html>
<html>
<head lang="en">
    <meta charset="UTF-8">    
    <LINK href="<?php echo URL; ?>styles/main.css" rel="stylesheet" type="text/css">
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
</head>
<body id="ifldasb2" class="top-background text">
    <div id="menuBar" class="center">
        <ul class="nbstyle1 sf-shadow">
            <li class="nav-ifldasb2">
                <a class="firstitem" href="<?php echo URL; ?>bug/index">
                    <span class="mainitem">Bug</span>
                    <span class="sf-sub-indicator"></span>
                </a>
                <ul>
                    <li>
                        <a class="sub-first" href="<?php echo URL; ?>bug/create">New Bug</a>
                    </li>
                    <li>
                        <a class="sub-first" href="<?php echo URL; ?>bug/edit">Edit Bug</a>
                    </li>
                    <li>
                        <a class="sub-first" href="<?php echo URL; ?>bug/listBug">Bug List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="listitem" href="<?php echo URL; ?>requirement/index">
                    <span class="mainitem">Requirement</span>
                    <span class="sf-sub-indicator"></span>
                </a>
                <ul>
                    <li>
                        <a class="sub-first" href="<?php echo URL; ?>requirement/create">New Requirement</a>
                    </li>
                    <li>
                        <a class="sub-last" href="<?php echo URL; ?>requirement/edit">Edit Requirement</a>
                    </li>
                    <li>
                        <a class="sub-last" href="<?php echo URL; ?>requirement/listReq">Requirement List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="listitem" href="<?php echo URL; ?>changerequest/index">
                    <span class="mainitem">Change Request</span>
                    <span class="sf-sub-indicator"></span>
                </a>
                <ul>
                    <li>
                        <a class="sub-first" href="<?php echo URL; ?>changerequest/create">New Requirement</a>
                    </li>
                    <li>
                        <a class="sub-last" href="<?php echo URL; ?>changerequest/edit">Edit Requirement</a>
                    </li>
                    <li>
                        <a class="sub-last" href="<?php echo URL; ?>changerequest/list">Requirement List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="listitem" href="<?php echo URL; ?>testcase/index">
                    <span class="mainitem">Test Case</span>
                    <span class="sf-sub-indicator"></span>
                </a>
                <ul>
                    <li>
                        <a class="sub-first" href="<?php echo URL; ?>testcase/create">New Test Case</a>
                    </li>
                    <li>
                        <a class="sub-last" href="<?php echo URL; ?>testcase/edit">Edit Test Case</a>
                    </li>
                    <li>
                        <a class="sub-last" href="<?php echo URL; ?>testcase/listTC">Test Case List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="listitem" href="<?php echo URL; ?>project/create">
                    <span class="mainitem">Project</span>
                    <span class="sf-sub-indicator"></span>
                </a>
                <ul>
                    <li>
                        <a class="sub-first" href="<?php echo URL; ?>project/create">New Project</a>
                    </li>
                    <li>
                        <a class="sub-last" href="<?php echo URL; ?>project/edit">Edit Project</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="listitem" href="<?php echo URL; ?>asset/index">
                    <span class="mainitem">Asset</span>
                </a>
                <ul>
                    <li>
                        <a class="sub-first" href="<?php echo URL; ?>asset/create">New Asset</a>
                    </li>
                    <li>
                        <a class="sub-last" href="<?php echo URL; ?>asset/edit">Edit Asset</a>
                    </li>
                    <li>
                        <a class="sub-last" href="<?php echo URL; ?>asset/listAsset">Asset List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="lastitem" href="http://www.timeclockfree.com/app.html">
                    <span class="mainitem">Timesheet</span>
                </a>
            </li>
        </ul>
    </div>
    <div id="logbuttons">        
        <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
    </div>
    <div id="maincontent" class="maincontent">
