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

function displayGenderBooks() {
    if (select.value !== "") {
        ul.innerHTML = "";
        input.value = "";
        const url = `https://www.googleapis.com/books/v1/volumes?q=subject:${select.value}&langRestrict=fr`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const body = data.items;
                console.log(body);
                body.forEach(element => {
                    const title = element.volumeInfo.title;
                    const author = element.volumeInfo.authors;
                    const poster = element.volumeInfo.imageLinks ? element.volumeInfo.imageLinks.thumbnail : "";
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

button.addEventListener('click', displayGenderBooks);
button.addEventListener('click', displayBooks);

function addFavorite() {
    const btnAdd = document.querySelectorAll('.btn-add');
    btnAdd.forEach(element => {
        element.addEventListener('click', () => {
            const title = element.previousElementSibling.previousElementSibling.textContent;
            const author = element.previousElementSibling.textContent;
            const poster = element.previousElementSibling.previousElementSibling.previousElementSibling.src;
            const li = document.createElement("li");
            li.classList.add("favorite");
            li.innerHTML = ` 
            <img src="${poster}" alt="poster">
            <h2>${title}</h2>
            <h3>${author}</h3>  
            <button class="btn-remove">Remove</button>
            `;
            document.querySelector('.favorites').appendChild(li);
        }
        );
    }
    );
}

