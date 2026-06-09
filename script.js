function searchBook(str) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "books/search.php?q=" + str, true);

    xhr.onload = function () {
        document.getElementById("result").innerHTML = this.responseText;
    };

    xhr.send();
}