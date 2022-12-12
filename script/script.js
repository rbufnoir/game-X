let input = document.getElementById('search-bar');
let games = document.getElementsByClassName('game');
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

    xmlhttp.open("POST", "http://localhost/game-X/asset/search.php", true);
    xmlhttp.send();
}

for (let i = 0; i < games.length; i++) {
    let game = games[i].firstElementChild.innerText;
    games[i].addEventListener('click', () => {
        window.location.href = "http://localhost/game-X/redirect/"+game;
    });
}