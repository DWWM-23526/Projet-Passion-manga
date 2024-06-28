<?php

require_once __DIR__ . '/../partials/head.php';
require_once __DIR__ . '/../partials/navbar.php';
require_once __DIR__ . '/../partials/header.php';
?>
<main class="container">

    <section id="mangas" class="my-5">
        <a href="/mangas">
            <h2>MANGAS</h2>
        </a>

        <p>Explorez notre vaste bibliothèque de mangas. De l'action trépidante aux romances émouvantes, en passant par des thrillers palpitants et des comédies hilarantes, notre collection couvre tous les genres pour satisfaire tous les goûts.</p>
    </section>

    <section id="mangakas" class="my-5">
        <a href="/mangakas">
            <h2>MANGAKAS</h2>
        </a>

        <p>Découvrez les artistes derrière vos mangas préférés. Notre section Mangakas vous présente les auteurs et illustrateurs, leur biographie, leurs œuvres majeures et leurs inspirations.</p>
    </section>

    <section id="genres" class="my-5">
        <a href="/genres">
            <h2>Genres</h2>
        </a>

        <p>Trouvez les mangas qui correspondent exactement à vos goûts en parcourant notre section Genres. Que vous soyez fan de shōnen, shōjo, seinen, josei, ou encore des sous-genres comme le mecha, l'isekai, ou le slice of life, nous avons organisé notre bibliothèque pour faciliter votre recherche.</p>
    </section>

    <section id="inscription" class="my-5">
        <a href="/login"></a>
        <h2>Rejoignez notre communauté</h2>
        <p>Pour une expérience encore plus enrichissante, créez un compte sur MangaHub. En devenant membre, vous pourrez :</p>
        <ul>
            <li>Suivre vos lectures et créer votre propre bibliothèque de mangas.</li>
            <li>Laisser des avis et des notes sur vos lectures.</li>
            <li>Recevoir des recommandations personnalisées.</li>
            <li>Participer aux discussions et échanger avec d'autres fans de mangas.</li>
        </ul>
        <button class="btn"><a href="/login">Inscrivez-vous dès maintenant</a></button>
    </section>

</main>
<?php
require_once __DIR__ . '/../partials/footer.php';
require_once __DIR__ . '/../partials/foot.php';
?>