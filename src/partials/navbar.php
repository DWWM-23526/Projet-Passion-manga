<?php require __DIR__ . '/../utils/urlis.php' ?> 

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">PASSION MANGAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100 d-flex justify-content-between flex-column flex-lg-row">
                <div class="d-flex flex-column flex-lg-row">
                    <li class="nav-item">
                        <a class="nav-link <?= urlIs('/mangas') ? 'isActive' : '' ?>" href="/mangas">Mangas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= urlIs('/mangakas') ? 'isActive' : '' ?>" href="/mangakas">Mangakas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= urlIs('/genres') ? 'isActive' : '' ?>" href="/genres">Genres</a>
                    </li>
                </div>
                <?php if (!isset($_SESSION["user"])) : ?>
                <li class="nav-item">
                    <a class="nav-link <?= urlIs('/login') ? 'isActive' : '' ?>" href="/login">Connexion</a>
                </li>
                <?php else : ?>
                    <li class="nav-item">
                    <a class="nav-link <?= urlIs('/') ? 'isActive' : '' ?>" href="/">Bonjour <?= $_SESSION["user"]["pseudo"]?></a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link <?= urlIs('/login') ? 'isActive' : '' ?>" href="/">Déconnexion</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>