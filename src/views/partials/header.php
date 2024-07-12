<section class="banner-section">
    <div class="banner">
        <h1><?= htmlspecialchars($headerTitle ?? 'LES MANGAKAS', ENT_QUOTES, 'UTF-8') ?></h1>
        <img src="/assets/img/baner.jpg" alt="Manga Image">
        <?php if (isset($_COOKIE['AuthToken'])) : ?>
            <?php if (str_contains($_SERVER['REQUEST_URI'], "/mangas/manga")) : ?>
                <?php if ($isFavorite) : ?>
                    <form method="POST">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="Id_user" value="<?= htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8') ?>" />
                        <input type="hidden" name="Id_manga" value="<?= htmlspecialchars($manga->Id_manga, ENT_QUOTES, 'UTF-8') ?>" />
                        <button class="btn" type="submit">Retirer des favoris</button>
                    </form>
                <?php else : ?>
                    <form method="POST">
                        <input type="hidden" name="Id_user" value="<?= htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8') ?>" />
                        <input type="hidden" name="Id_manga" value="<?= htmlspecialchars($manga->Id_manga, ENT_QUOTES, 'UTF-8') ?>" />
                        <button class="btn" type="submit">Ajouter aux favoris</button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>