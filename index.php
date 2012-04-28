<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>IP Monitoring System | Log In</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link  href="http://fonts.googleapis.com/css?family=Ubuntu:300,300italic,regular,italic,500,500italic,bold,bolditalic" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <div class="header">

            <div class="container">

                <div class="nav">

                    <ul>
                        <li><a class="faq" href="#">FAQ</a></li>
                    </ul>

                </div>

                <h1>IP Monitoring System</h1>

            </div><!--Container-->

        </div><!--Header-->

        <div class="content">

            <div class="container">

                <div class="box login_box">

                    <form action="login.php" method="post">
                        <p><input type="text" name="username"/>Username:</p>
                        <p><input type="password" name="password" />Password:</p>
                        <div class="clear"></div>
                        <input type="submit" id="" value="Login"  />
                        <input type="reset" id="" value="Reset" />
                        <div class="clear"></div>
                    </form>

                </div>

            </div><!--Container-->

        </div><!--Content-->

        <div class="footer">

            <div class="container">

                <p>2011 &copy; IP Monitoring System</p>

            </div><!--Container-->

        </div><!--Footer-->

    </body>

</html>