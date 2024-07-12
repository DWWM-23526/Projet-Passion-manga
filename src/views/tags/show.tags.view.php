<?php

require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/navbar.php';
require __DIR__ . '/../partials/header.php';
?>

<main>
    <section class="container">
        <div class="container">
            <div class="row g-3 mt-3">
                <?php
                foreach ($mangas as $manga) {
                    $card_title = $manga->manga_name;
                    $card_img = '/assets/img/genre-image.webp';
                    $card_alt = $manga->manga_name;
                    $path = '/mangas/manga?id=' . $manga->Id_manga;
                    require __DIR__ . '/../partials/card.php';
                }
                ?>
            </div>
        </div>
    </section>
</main>
<?php
require __DIR__ . '/../partials/footer.php';
require __DIR__ . '/../partials/foot.php';
?>