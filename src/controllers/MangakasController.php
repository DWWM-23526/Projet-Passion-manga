<?php

namespace controllers;

use core\App;
use controllers\Controller;
use services\MangakaService;

class MangakasController extends Controller
{
  protected MangakaService $mangakaService;

  public function __construct()
  {
    $this->mangakaService = App::injectService()->getContainer(MangakaService::class);
  }
  public function index()
  {
    $headerTitle = "LES MANGAKAS";
    $cardsTab = $this->mangakaService->getAllMangakas();

    $this->render('/mangakas/index.mangakas.view.php', [
      'cardsTab' => $cardsTab,
      'headerTitle' => $headerTitle
    ]);
  }

  public function post()
  {
    $headerTitle = 'LES MANGAKAS';

    if (isset($_POST['search']) && !empty(($_POST['search']))) {
      $searchTerm = $_POST['search'];
      $searchTerm2 = $_POST['search'];
      $cardsTab = $this->mangakaService->searchMangakas($searchTerm, $searchTerm2);

      $this->render('/mangakas/index.mangakas.view.php', [
        'cardsTab' => $cardsTab,
        'hearderTitle' => $headerTitle
      ]);
    } else {
      header('Location: /mangakas');
    }
  }

  public function show()
  {
    $mangaka = $this->mangakaService->getAllMangakasById($_GET['id']);
    $headerTitle = $mangaka->first_name . " " . $mangaka->last_name;

    $this->render('/mangakas/show.mangakas.view.php', [
      'mangaka' => $mangaka,
      'headerTitle' => $headerTitle
    ]);
  }
}
