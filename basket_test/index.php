
<html lang="da">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bil Bixen</title>
        <script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="core_1.css" type="text/css"/>
    </head>
    <body>
        <div id="opgaven">
            <h4>Kort opgavebskrivelse : </h4>
            Jeg har i dette lille projekt beskæftiget mig med at lave en huskeseddel.
            Listen med produkter har jeg hentet fra databasen vha. et AJAX kald.
            De valgte produkter bliver tilføjet i en string i javascript vha. push metoden.
            Når listen er færdig kan den vises og godkendes.
            Ved godkendelse bliver en string med produkt id'er sendt til min php handler ('save_list.php')
            og en tilbagemelding bliver vha javascript sat ind i html elementet 'response'.
        </div>
        <div id="theResponse"></div>
        <div id="theList">
            <p>Din Liste</p><br>
            <img src="../assets/icon/list_icon.png" title="Se listen" id="list_icon">
            <span id="count"></span>
        </div>
        <div id="listNBtn">
        <div id="myList"> </div>
        <div id="del_list"></div>
        </div>
        <div id="container"></div>
        <button type="button" class="btn btn-primary btn-lg" id="item_button">Se varer</button>
        <script src="script.js"></script>       
    </body>
</html>