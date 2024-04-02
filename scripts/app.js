const input = document.querySelector('input');
const select = document.querySelector('select');
const button = document.querySelector('.search-btn');
const ul = document.querySelector('.books'); 
const container = document.querySelector('.container');

function displayBooks() {
    if (input.value !== "") {
        ul.innerHTML = "";
        const url = `https://www.googleapis.com/books/v1/volumes?q=${input.value}&langRestrict=fr`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const body = data.items;
                console.log(body);
                body.forEach(element => {
                    const title = element.volumeInfo.title;
                    const author = element.volumeInfo.authors;
                    const poster = element.volumeInfo.imageLinks ? element.volumeInfo.imageLinks.thumbnail : ""; // Vérifie si 'imageLinks' est défini
                    const li = document.createElement("li");
                    li.classList.add("book");
                    li.innerHTML = ` 
                    <img src="${poster}" alt="poster">
                    <h2>${title}</h2>
                    <h3>${author}</h3>  
                    <button class="btn-add">Add to favorite</button>       
                    `;
                    ul.appendChild(li);
                });
                container.remove(); 
            })
            .catch(error => console.error(error));
    }
}

function displayGenderBooks () {
    if (select.value !== "") { // Si la valeur de l'input n'est pas vide
        ul.innerHTML = ""; // On vide la liste 
        const url = `https://www.googleapis.com/books/v1/volumes?q=subject:${select.value}&langRestrict=fr`; // On crée l'url de l'API
        fetch(url) // On fetch l'url
            .then(response => response.json()) // On récupère la réponse en JSON
            .then(data => {
                const body = data.items; // On récupère les données
                console.log(body); 
                body.forEach(element => {
                    const title = element.volumeInfo.title; 
                    const author = element.volumeInfo.authors;
                    const poster = element.volumeInfo.imageLinks ? element.volumeInfo.imageLinks.thumbnail : ""; 
                    const li = document.createElement("li"); 
                    li.classList.add("book"); // On ajoute une classe à la balise li
                    li.innerHTML = ` 
                    <img src="${poster}" alt="poster">
                    <h2>${title}</h2>
                    <h3>${author}</h3>  
                    <button class="btn-add">Add to favorite</button>       
                    `;
                    ul.appendChild(li); //  On ajoute la balise li à la liste ul
                });
                container.remove(); 
            })
            .catch(error => console.error(error)); // On affiche une erreur si il y en a une
    }}

button.addEventListener('click', displayGenderBooks); // On écoute le click sur le bouton
button.addEventListener('click', displayBooks); // On écoute le click sur le bouton
