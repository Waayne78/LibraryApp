<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons">
    <script src="../scripts/app.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Bookly</title>
</head>

<body>
    <header>
        <nav>
            <ul>    
                <li>Home</li>
                <li> <button class="search-btn">Search</button><input type="text" placeholder="Search for a book"></li>
                <li><a href="signup.view.php">Signup</a></li>
                <li><a href="login.view.php">Login</a></li>
                <li>Settings</li>
                <li>
                    <select id="genre" name="genre">
                        <option value="fiction">Fiction</option>
                        <option value="science-fiction">Science-fiction</option>
                        <option value="mystère">Mystère</option>
                        <option value="horreur">Horreur</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="biographie">Biographie</option>
                        <option value="histoire">Histoire</option>
                    </select>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="best">
            <div class="content">
                <h1>POPULAR <br> BESTELLERS</h1>
                <p>We picked up the most popular <br>
                    books for you, based on your taste. <br>
                    Check it !
                </p>
            </div>
            <button class="btn">Watch full list</button>
        </div>
        <div class="intrest">
            <div class="content">
                <h1>CAN BE <br> INTRESTING</h1>
                <p>Check this list of books, picked up <br>
                    by the website and choose <br>
                    something new !
                </p>
            </div>
        </div>
    </div>
    </div>
    <div class="bookss">
            <ul class="books">
                <li></li>
            </ul>
        </div>
    <footer>
        <div class="footer-content">
            <p> &copy;Bookly 2024 </p>
            <ul>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="contact.view.php">Contact</a></li>
                <li><a href="#">Mention légales</a></li>
            </ul>
        </div>

    </footer>

</body>