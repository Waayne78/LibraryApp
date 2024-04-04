<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Bookly</title>
</head>
<body>

<div class="signup-container">
    <form class="signup-form" method="POST" action="../controllers/signup.php">
        <h1>SIGNUP</h1>
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Example@gmail.com">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm" placeholder="Confirm password">
        <input type="submit" name="submit" value="Create Account">
    </form>
    
    <?php if (isset($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif ?>
</div>



</body>
</html>
    


