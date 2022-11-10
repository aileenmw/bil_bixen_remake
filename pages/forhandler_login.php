<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT `username`,`password`,`level` FROM `bil_bixen_users` WHERE `username`= '$username' and `password` = '$password'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $level = $row['level'];
    
    if (mysqli_num_rows($result) && $level == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $level;
        header('Location: admin/admin.php');           
    } 
    elseif (mysqli_num_rows($result) && $level == 2) {
         $_SESSION['level'] = $level;
        header('Location: index.php?page=forside'); 
    }
    elseif(empty($username) || empty($password)){
        echo '<h1 style="color:red; margin: 100px auto;">Vær venlig, at udfylde alle felter</h1>';
    }
    else {
        echo '<h1 style="color:red; margin: 100px auto;">Du har ikke autorisation til at logge ind på denne side</h1>';
    }
}
?> 
<body>
    <form  method="post">
        <input type="text" name="username" placeholder="brugernavn"><br>
        <input type="text" name="password" placeholder="Indtast Kodeord"><br>
        <input type="checkbox" name="forgot_password" value="Forgot password">Glemt kodeord<br>
        <input type="submit" name="submit" value="Login" class="submit"><br>
    </form>

</body>
