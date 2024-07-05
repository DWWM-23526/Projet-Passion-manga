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
  $this->mangakaService = App::inject()->getContainer(MangakaService::class);
}
  public function index()
  {
    $cardsTab = $this->mangakaService->getAllMangakas();
    $headerTitle = "LES MANGAKAS";

    $this->render('/mangakas/index.mangakas.view.php', [
      'cardsTab'=> $cardsTab,
      'headerTitle'=> $headerTitle
    ]);
  }

  public function show()
  {
    $mangaka = $this->mangakaService->getAllMangakasById($_GET['id']);
    $headerTitle = $mangaka['first_name']. " ". $mangaka['last_name'];

    $this->render('/mangakas/show.mangakas.view.php', [
      'mangaka'=> $mangaka,
      'headerTitle'=> $headerTitle
    ]);
  }
}