$(document).ready(function () {
    $("#item_button").click(function () {
        $.ajax({
            type: 'POST',
            url: 'items.php',
            success: function (data) {
                document.getElementById("container").innerHTML = data;
                document.getElementById('list_icon').style.display = 'flex';
                document.getElementById('theList').style.display = 'flex';
                document.getElementById("item_button").style.display = 'none';
                document.getElementById("opgaven").style.display = 'none';
            }
        });
    });
});

var modelList = [];
function addToList(model) {
    modelList.push(model);
}

var idList = [];
var c = '';
function addIdList(car_id) {
    idList.push(car_id);
    c = idList.length;
    document.getElementById("count").style.display = 'block';
    document.getElementById("count").innerHTML = c;
}

document.getElementById("list_icon").addEventListener("click", function () {
    document.getElementById("theList").style.display = 'none';
    document.getElementById("myList").innerHTML = modelList;
//    alert('Gute Nacht mein Schatz!!  :-)');
    var btn = document.createElement("BUTTON");
    btn.id = 'btn_send';
    myList.appendChild(btn);
    var t = document.createTextNode("Godkend");
    btn.appendChild(t);
    var btn_del = document.createElement("BUTTON");
    btn_del.id = 'btn_del';
    del_list.appendChild(btn_del);
    var p = document.createTextNode("Tøm");
    btn_del.appendChild(p);
});

$(document).ready(function () {
    $("#myList").click(function () {
        var items = idList.join(",");
        items = 'list=' + items;
        $.ajax({
            type: 'POST',
            url: 'save_list.php',
            data: items,
            success: function (response) {
                document.getElementById("theResponse").innerHTML = response;
                document.getElementById("myList").style.display = 'none';
                document.getElementById("btn_del").style.display = 'none';
                window.setTimeout(function () {
                    window.location.href = "http://xai01.wi2.sde.dk/bil_bixen_remake/basket_test/index.php";
                }, 2000);
            }
        });
    });
});

document.getElementById("del_list").addEventListener("click", function () {
    modelList = [];
    idList = [];
    response = '<h2>Din liste er tømt</h2>';
    document.getElementById("myList").style.display = 'none';
    document.getElementById("btn_del").style.display = 'none';
    document.getElementById("theResponse").innerHTML = response;
    window.setTimeout(function () {
        window.location.href = "http://xai01.wi2.sde.dk/bil_bixen_remake/basket_test/index.php";
    }, 2000);
});