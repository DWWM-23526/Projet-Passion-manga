<?php

require __DIR__ . '/../../partials/head.php';
require __DIR__ . '/../../partials/navbar.php';
require __DIR__ . '/../../partials/header.php';
?>
<main>



    <section class="manga-info container d-flex my-5">





        <div class="manga-image">
            <img src="/assets/img/naruto1.jpg" alt="<?= $manga['manga_name']; ?>">
        </div>
        <div class="manga-details mx-5 my-2">

            <div>
                <h3 class="mb-5"><strong>INFORMATION</strong></h3>
                <p><strong>Edition:</strong> <?= $manga['edition']; ?></p>
                <p><strong>Nombre de tomes Total:</strong> <?= $manga['total_tome_number']; ?></p>
                <p><strong>Année de sortie:</strong> <?= $manga['year_release']; ?></p>
                <p><strong>Numéro de tome:</strong> <?= $manga['tome_number']; ?></p>
            </div>

            <div class="mt-5">
                <h3 class="mb-5"><strong>DESCRIPTION</strong> </h3>
                <p><?= $manga['texte']?></p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet fugiat possimus non sequi voluptatem dolorem eos dolores quas tenetur similique, recusandae incidunt, nam eveniet, dolore impedit. Dicta, esse. Id, adipisci!
                Sint magni ad unde maiores exercitationem officia, deleniti quod ea suscipit labore molestias nihil modi illum architecto iure saepe natus nisi, vitae facere temporibus adipisci magnam neque. Totam, maxime facere!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam nam iste, recusandae adipisci, ipsa vitae tempora accusamus nemo quam in sequi labore eaque rem maiores culpa enim ex reiciendis maxime?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto quis esse laborum nostrum tempore itaque impedit, beatae nemo molestiae cumque, expedita adipisci id ipsum sequi veritatis! Pariatur iste autem aut.</p>
            </div>



        </div>


    </section>

</main>
<?php
require __DIR__ . '/../../partials/footer.php';
require __DIR__ . '/../../partials/foot.php';
?>