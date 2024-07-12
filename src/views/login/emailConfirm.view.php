<?php
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  header("Location: /verifyToken");
  exit();
} else {
  echo "Invalid token !";
}
?>

<!-- <h3 class="text-center mt-5">Cliquez sur ce bouton pour confirmer la création du compte</h3>
<div class="container d-flex justify-content-center mt-5">
  <form action="" method="post">
    <button type="submit" class="btn btn-dark">Envoyer</button>
  </form>
</div> -->