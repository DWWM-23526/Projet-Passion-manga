<?php

require_once __DIR__ . '/../partials/head.php';
require_once __DIR__ . '/../partials/navbar.php';
require_once __DIR__ . '/../partials/header.php';
?>
<main class="container">

    <section id="favories" class="my-5">
    <section>

<div class="container">
    <div class="row g-3 mt-3">
        <?php
        foreach ($mangas as $manga) {
            $card_title = $manga->manga_name;
            $card_img = '/assets/img/naruto1.jpg';
            $card_alt = $manga->manga_name;
            $path = "/mangas/manga?id=" . $manga->Id_manga;
            require __DIR__ . '/../partials/card.php';
        }
        ?>
    </div>
</div>
</section>
    </section>

</main>
<?php
require_once __DIR__ . '/../partials/footer.php';
require_once __DIR__ . '/../partials/foot.php';
?>