<html>
    <head>
        <meta charset="UTF-8">
        <title>Find City By Zipcode</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="assets/form.css" rel="stylesheet" type="text/css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

        <script>
            function byViaPostnr() {
                var value = $('#postnr').val();

                //  alert(value);
                //  autocomplete http://dawa.aws.dk/autocomplete?q=rrrr&type=adgangsadresse&caretpos=4&fuzzy=
                // http://autocomplete.aws.dk/ her lÃ¦s hvordan anvender du service
                // og guide: http://autocomplete.aws.dk/guide
                $.ajax({
                    url: 'http://dawa.aws.dk/postnumre/' + value,
                    data: {
                        postnr: value
                    },
                    type: 'GET',
                    datatype: 'json',
                    async: 'true',
                    success: function (data) {
                        //alert(data.navn);
                        //debugger;
                        hentet = data.navn;
                    },
//                    error: function (xhr, status, errorThrown) {
                    error: function (xhr) {
//                      alert(xhr.responseText);
                        var jsonResponse = JSON.parse(xhr.responseText);
                        hentet = jsonResponse.type;
//                      $(".alert").html(jsonResponse.message);
                    },
                    complete: function (xhr, status) {
                        $('#city').val(hentet);
                    }
                })
            }

            $(document).ready(function () {
                $('#postnr').on('blur', function () {
                    byViaPostnr();
                });
            }).fail(function (jqXHR, textStatus) {
                alert(jqXHR.status + " " + jqXHR.statusText); // kaldes ikke ved jsonp
            })

        </script>
    <form id="find_town">
        <input type="text" name="postnr" id="postnr" placeholder="Postnummer"/>
        <input type="text" name="bynavn" id="city" />

    </form>

