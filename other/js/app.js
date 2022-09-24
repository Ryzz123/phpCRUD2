const keyword = document.getElementById("keyword");
const tombolCari = document.getElementById("tombol-cari");
const container = document.querySelector(".table");

keyword.addEventListener("keyup", function() {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET',"other/js/ajax/data.php?keyword=" + keyword.value, true);
    xhr.send();

})