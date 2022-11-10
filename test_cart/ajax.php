<?php
 session_start();
 require_once( "db.php" );
 require_once( "cart.php" );
 $cart = new cart();
 $action = strip_tags( $_GET["action"] );
 switch ($action) {
  case "add":
   $cart->addToCart();
   break;
 }
?>