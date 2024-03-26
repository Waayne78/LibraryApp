const input = document.querySelector('input');
const select = document.querySelector('select');

 // URL de l'API Google Books

const genderUrl = `https://www.googleapis.com/books/v1/volumes?q=${select.value}:fiction&langRestrict=fr`;
const url = "https://www.googleapis.com/books/v1/volumes?q=subject:fiction&langRestrict=fr";

const fetchBooks = async () => {
    const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${input.value}&langRestrict=fr`);
    const data = await response.json();
    console.log(data);
}


function randomBook(){
    let random = Math.floor(Math.random() * 100);
    

} 