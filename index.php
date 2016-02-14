<?php include_once("inc/config.php"); ?>
<?php include_once("inc/PDO-mysql.php"); ?>
<?php include_once("inc/header.php"); ?>
<?php include_once("inc/navbar.php"); ?>

<?php
ini_set('magic_quotes_gpc', 0);
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<div class="github-fork-ribbon-wrapper left">
    <div class="github-fork-ribbon">
        <a href="https://github.com/djphil/osavatarpicker" target="_blank">Fork me on GitHub</a>
    </div>
</div>

<?php
if (isset($_GET['home'])) $page = 1;
else if (isset($_GET['help'])) $page = 2;
else if (isset($_GET['search'])) $page = 3;
else {$page = 1;} 

echo '<div class="content">';
if ($page == 1) require("inc/avatars_list.php");
else if ($page == 2) require("inc/help.php");
else if ($page == 3) require("inc/search.php");
else require("inc/404.php");
echo '</div>';
?>

<?php include_once("inc/footer.php"); ?>