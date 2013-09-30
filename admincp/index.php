<?php
define('DIR_APP', 'admincp');
include('config.php');
include('../application/libraries/autoload.php');

$db = new Database;
$db->connect($dbhost, $dbuser, $dbpass, $dbname);
$mod = new Module;
$mod->getlink();
$mod->lang('index');

if (empty($_SESSION['admin_id'])) {
    $mod->load('user', 'login');
} else {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en">
        <head>
            <base href="<?php echo BASE_NAME; ?>admincp/" />
            <script type="text/javascript">
				var BASE_NAME = '<?php echo BASE_NAME; ?>';
	        </script>
            <title>TMVCMS Control panel | TMVCMS Manager</title>
            <!--
            Loading CSS file
            -->
            <style type="text/css" media="all">

                /* Load primary framework elements */
                @import url(css/framework.css);

                /* Now, let's set the style */
                @import url(css/style_coffee.css);

            </style>

            <!--[if lt IE 7]>
            <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css" />
            <![endif]-->

            <!-- Fix PNG under Internet Explorer 6 -->
            <style type="text/css">
                img { behavior: url(js/iepngfix.htc) !important; }
                .navbullet { behavior: url(js/iepngfix.htc) !important; }
            </style>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
			<link rel="stylesheet" type="text/css" href="js/jquery/ui-lightness/jquery-ui-1.8.4.custom.css" />
        <!-- Loading javascript -->
        <script src="js/jquery.js" type="text/javascript"></script>

        <script src="js/functions.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery/jquery-1.4.2.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery/jquery-ui-1.8.4.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery/superfish/js/superfish.js"></script>
        <script type="text/javascript" src="js/jquery/tab.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script src="js/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery/jquery-ui-1.8.4.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery/timepicker.js"></script>
        <body>

            <div id="container"> <!-- Container begins here -->

                <?php $mod->load('left'); ?>



                <div id="primary"> <!-- Primary begins here -->
                    <div class="header top_nav">

                        <span class="session">Signed in as <a href="user/edit" title=""><?php echo $_SESSION['admin_user']; ?></a> (<a href="<?php echo $mod->url('index.php?p=user&q=logout'); ?>" title="Sign out">Sign out</a>)</span>
                    </div>

                    <div id="content"> <!-- Content begins here -->

                        <?php $mod->controller(); ?>
                    </div> <!-- END Content -->
                </div> <!-- END Primary -->


                <div class="clear"></div>
            </div> <!-- END Container -->

        </body>

    </html>
<?php }
mysql_close();
?>


