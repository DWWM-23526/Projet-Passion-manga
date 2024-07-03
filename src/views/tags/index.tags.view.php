<?php

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/navbar.php';
require __DIR__ . '/../../partials/header.php';
?>
<main>

    <section>
        
    <div class="container">
        <div class="row g-3 mt-3">
        <?php
            foreach ($cardsTab as $card) {
            $card_title = $card['tag_name'] ;
            $card_img = '/assets/img/genre-image.webp';
            $card_alt = $card['tag_name'];
            $path = '/genres/genre?id=' . $card['Id_tag'];
            require __DIR__ . '/../../partials/card.php';
            }
        ?>
    </div>
       
    </section>

</main>
<?php
require __DIR__ . '/../../partials/footer.php';
require __DIR__ . '/../../partials/foot.php';
?>