<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <script type="text/javascript"> 
            
        function doSomething() { 
    $.get("handler.php"); 
    return false; 
} 
</script>
<a href="#" onclick="doSomething();">Click Me!</a>
        <?php
        // put your code here
        ?>
    </body>
</html>
