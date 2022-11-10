<?php
//ini_set('display_errors', 1);
//<?php die('hertil'); 

$role = $_SESSION['role'] ?? null;

$login = 'login' ?? null;
$login_tekst = 'Forhandler-login' ?? null;
$login_note = 'none' ?? null;
$display = 'none' ?? null;

//$_SESSION['logget'] = true;
//$_SESSION['role'] = $user->role;
$user = $_SESSION['username'] ?? null;
$user = ucfirst($user) ?? null;
$user_id = $_SESSION['user_id'] ?? null;

if (isset($_SESSION['role']) && $_SESSION['role'] == 'forhandler') {
    $login = 'logout';
    $login_tekst = 'Logout';
    $login_note = 'block';
    $display = 'block';

    $sql = "SELECT COUNT(*) as nmb FROM `bil_bixen_huskeliste` WHERE `user_id`= $user_id";
    $data = $mysqli->query($sql);
    $row = $data->fetch_object();
    $nmb = $row->nmb;
}

$message = $_GET['message'] ?? null;
?>
<!DOCTYPE html>
<html lang="da">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bil Bixen</title>
        <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/form.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Titillium+Web:300,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Maven+Pro|Quicksand" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <nav class="menu">
                    <a href="index.php?page=forside" id="index_link"><img src="assets/img/logo.jpg" alt="logo"></a>
                    <ul>
                        <li><a href="index.php?page=find_bil">Find bil</a></li>
                        <li><a href="index.php?page=aktuelt">Aktuelt</a></li>
                        <li><a href="index.php?page=om_os">Om os</a></li>
                        <li><a href="index.php?page=kontakt">Kontakt Os</a></li>
                        <li><a href="index.php?page=<?php echo $login; ?>"><?php echo $login_tekst ?></a></li>
                    </ul>
                </nav>
                <form class="search_form" action="" method="post">
                    <input type="text" name="search_input" placeholder="Indsæt søgeord">
                    <input type="submit" name="search_submit" id="submit" value="Insend"> 
                </form>
<?php
if ((isset($_POST['search_submit']))&!empty($_POST['search_input'])) {
    $search_input = $_POST['search_input'];  /* trim, strip_tags, str_replace, explode */

    $sql_search = "SELECT `car_id`, `reg_date`, `doors`, `km`, `price`, model FROM `bil_bixen` WHERE `model` LIKE '%$search_input%' ";

    $search_result = $mysqli->query($sql_search);
    echo '<div class="suggestion_field">';
    while ($row = $search_result->fetch_object()) {
        $hidden = 'block';
        $id = $row->car_id;
        $suggestion = '$row->model, $row->price, $row->reg_date';
//                $suggestion = utf8_encode($suggestion);
//               
        echo '<ul >';
        echo'<li>';
        echo '<a href = "index.php?page=details&id=' . $id . '">' . utf8_encode($row->model) . ' , Pris : ' . $row->price . ',- , 1.reg dato:' . $row->reg_date . '</a>';
        echo '</li>';
        echo '</ul>';
//               
    }
    echo '</div>';
}
else { }
?>
                <section>
                    <div class = "text">
                        <h>gør som 10.000 andre</h>
                        <p>sælg din bil på bilbixen</p>
                    </div>
                    <img src = "assets/img/car.png" alt = "car">
                </section>
                <h3 style = "display:<?php echo $login_note ?>;" id="login_note"> 
                    <a href="handlers/liste_handler.php?action=read&user_id=<?php echo $user_id; ?>" >
                        <div class="list_icon">
                            <img src="assets/icon/list_icon.png"  alt="list icon" title="Se din liste" style="display: <?php echo $display; ?>;" >
                            <span class="nmb_listitems"><?php echo $nmb; ?></span>
                        </div>
                    </a>
                    Du er logget ind, <?php echo $user; ?>
                    <br><?php echo $message; ?>
                </h3>
            </header>