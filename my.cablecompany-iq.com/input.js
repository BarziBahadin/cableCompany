
function go() {
    var item = document.querySelectorAll("#myUL a");
    for (let index = 0; index < item.length; index++) {
        item[index].onclick = function () {
            document.getElementById("myInput1").value = this.innerHTML;
            document.getElementById("my-scrollbar").style.display = "none";
        }
    }
}
    function clos() {
            document.getElementById("my-scrollbar").style.display = "none";
        }

// function btn() {
//     var x = document.getElementById("my-scrollbar");

//     if (x.style.display === "none") {
//         x.style.display = "";

//     } else {
//         x.style.display = "none";

//     }


function showList() {
    document.getElementById("my-scrollbar").style.display = "block";
    document.getElementById("my-scrollbar").classList.toggle("show");

}

function search() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";

        } else {
            li[i].style.display = "none";
        }
    }

}
