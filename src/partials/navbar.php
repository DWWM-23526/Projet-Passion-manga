<?php require __DIR__ . '/../utils/urlis.php' ?> 

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Passion Mangas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100 d-flex justify-content-between flex-column flex-lg-row">
                <div class="d-flex flex-column flex-lg-row">
                    <li class="nav-item <?= urlIs('/mangas') ? 'isActive' : '' ?>">
                        <a class="nav-link" href="/mangas">Mangas</a>
                    </li>
                    <li class="nav-item <?= urlIs('/mangakas') ? 'isActive' : '' ?>">
                        <a class="nav-link" href="/mangakas">Mangakas</a>
                    </li>
                </div>

                <li class="nav-item <?= urlIs('/login') ? 'isActive' : '' ?>">
                    <a class="nav-link" href="/login">Connexion</a>
                </li>

            </ul>
        </div>
    </div>
</nav>