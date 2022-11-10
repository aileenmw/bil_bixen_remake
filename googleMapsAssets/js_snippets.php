<?php
echo '<h4>encodeURI og decodeURI</h4> ';
?>
<p>Click the button to encode a URI.</p>

<button onclick="myFunction()">Try it</button>
<button onclick="decodeFunction()">Try decode</button>
<p>var uri = "my test.asp?name=ståle&car=saab";</p>
<p id="demo"></p>
<p id="deco"></p>

<script>
    function myFunction() {
        var uri = "my test.asp?name=ståle&car=saab";
        var res = encodeURI(uri);
        document.getElementById("demo").innerHTML = res;
    }
    function decodeFunction() {
        var decode = document.getElementById("demo").innerHTML;
        var decoded = decodeURI(decode);
        document.getElementById("deco").innerHTML = decoded;
    }

</script>


<h2> Replace character in string </h2>
<p>
    var chars = {'Æ': 'Ae', 'æ': 'ae', 'å': 'aa', 'Å': 'Aa', 'ø': 'oe', 'Ø': 'Oe', ' ': '|'};<br>
    adresse = address.replace(/[ÆæåÅøØ  ]/g, m => chars[m]);
</p>



<h3>Function, som henter variabel, der blev sendt med link fra sidste side</h3>
<p>(window.location.href = 'pages/theRoute.html?address=' + adresse;)</p>
function getQueryVariable(variable)                         <br>
{                                                           <br>
var query = window.location.search.substring(1);            <br>
var vars = query.split("&");                                <br>
for (var i = 0; i < vars.length; i++) {                     <br>
var pair = vars[i].split("=");                              <br>
if (pair[0] == variable) {                                  <br>
return pair[1];                                             <br>
 }                                                          <br>
}                                                           <br>
return(false);                                              <br>
  }                                                         <br><br>

var address = getQueryVariable("address");
