<?php
include '../partials/header.php';
?>


<div class="login-container">
    <form class="login-form" method="POST" action="../controllers/login.php">
        <h1>LOGIN</h1>
        <input type="email" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="LOGIN">
    </form>
</div>

<?php if (isset($error)): ?>
    <p class="error">
        <?= $error ?>
    </p>
<?php endif ?>


<?php

include '../partials/footer.php';

?>