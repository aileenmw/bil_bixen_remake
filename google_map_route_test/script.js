var adresse = 'Brændekildevej 30,Odense';

//    document.getElementsByClassName('btn_send').addEventListener("click",function(){
//        alert(address);
//        window.location.href = 'theRoute.html?address='+address;
//    });


document.body.addEventListener('click', function (evt) {
    if (evt.target.className === 'btn_send') {
        alert (adresse);
        var address = adresse.replace(" ", "");
        address = address.replace("å", "aa");
        address = address.replace("ø", "oe");
        address = address.replace("æ", "ae");
        alert(address);
        window.location.href = 'theRoute.html?address='+address;
    }
}, false);
