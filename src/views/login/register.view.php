<?php
require_once __DIR__ . '/../../partials/head.php';
require_once __DIR__ . '/../../partials/navbar.php';
require_once __DIR__ . '/../../partials/header.php';
?>

<main>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 d-flex align-items-center">
                    <h2 class="text-center mb-4 me-5">Enregistrez vous</h2>
                    <div class="form-container p-5 text-center">
                        <form method="POST">
                            <div class="form-group">
                                <label for="pseudo">Pseudo:</label>
                                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Enter pseudo">
                            </div>
                            <div class="form-group mt-4">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group mt-4">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
                            </div>
                            <!-- <div class="form-group mt-4">
                                <label for="pwd">Confirm Password:</label>
                                <input type="password" class="form-control" id="pwd_conf" placeholder="Confirm password">
                            </div> -->
                            <button type="submit" class="btn btn-dark btn-block mt-4">Submit</button>
                        </form>
                        <div class="mt-3">
                            <a href="/login">Connectez-vous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br>
</main>
<?php
require_once __DIR__ . '/../../partials/footer.php';
require_once __DIR__ . '/../../partials/foot.php';
?>