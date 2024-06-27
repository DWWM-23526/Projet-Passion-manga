<?php

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/navbar.php';
?>
<main>

    <section>
        <h1><?= $titlePage ?> </h1>
        <div class="container">
            <div class="row g-3 mt-3">
                <?php
                foreach ($cardsTab as $card) {
                    require __DIR__ . '/../../partials/card.php';
                }
                ?>
            </div>
        </div>
    </section>

</main>
<?php
require __DIR__ . '/../../partials/footer.php';
require __DIR__ . '/../../partials/foot.php';
?>