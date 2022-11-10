
<?php
ini_set('display_errors', 1);
require_once "includes/global_include.php";
require_once "includes/header.php";

$page = null;
if (  isset($_POST['page'])) {
    $page = $_POST['page'];
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$page = ($page != null) ? "pages/" . $page . '.php' : 'pages/forside.php' ;

if (file_exists($page)) {
    include_once( $page );
} else {

    include_once 'pages/404.php';
}

require_once "includes/footer.php";



