<?php

require_once __DIR__ . '/../partials/head.php';
require_once __DIR__ . '/../partials/navbar.php';
require_once __DIR__ . '/../partials/header.php';
?>
<main>
    
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 d-flex align-items-center">
                    <h2 class="text-center mb-4 me-5">INSCRIT TOI</h2>
                    <div class="form-container p-5 ">
                        <form method="POST">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group mt-4">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php
require_once __DIR__ . '/../partials/footer.php';
require_once __DIR__ . '/../partials/foot.php';
?>