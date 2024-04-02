<?php

include "../partials/header.php";

?>
<div class="contact-container">
    <form class="contact-form" method="POST">
        <h1>Contact us</h1>
        <input name="email" type="email" placeholder="Your email here...">
        <input name="subject" type="text" placeholder="Object : ">
        <textarea name="body" cols="30" rows="10" placeholder="Your message ..."></textarea>
        <input id="contact-sub  " name="submit" type="submit">
    </form>
</div>

<!-- Si $error existe, on l'affiche dans un <p> -->
<?php if (isset ($error)): ?>
    <p class="error">
        <?= $error ?>
    </p>
<?php endif ?>


<?php

// include "partials/footer.php";

?>