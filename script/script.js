let input = document.getElementById('search-bar');
window.addEventListener('load', getSearchTerms);



function getSearchTerms() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $('#search-bar').autocomplete({
                source: JSON.parse(this.responseText)
            });
        }
    }

    xmlhttp.open("POST", "search.php", true);
    xmlhttp.send();
}