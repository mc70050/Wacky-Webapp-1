<!DOCTYPE html>
<?php
if (!defined('APPPATH'))
	exit('No direct script access allowed');
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta charset="utf-8">
        
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
    </head>
    <body>
        <div class="container">
            <div class="navbar">
                <div class="navbar-inner">
                    {menubar} 
                </div>
            </div>           
            <div id="content">
                <h1>{pagetitle}</h1>
                {content}
            </div>
            <div class="footer">
                <p>© 2017 ANewFuego, Inc</p>
            </div>     
        </div>
        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>