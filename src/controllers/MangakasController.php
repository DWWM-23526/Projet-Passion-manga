<?php

namespace controllers;

use core\App;
use services\MangakasService;
use controllers\Controller;

class MangakasController extends Controller
{
private $db;

public function __construct()
{
  $this->db = App::getServicesContainer()->getContainer(MangakasService::class);
}
  public function index()
  {
    $cardsTab = $this->db->selectAllMangakas();
    $headerTitle = "LES MANGAKAS";

    $this->views('/mangakas/index.mangakas.view.php', [
      'cardsTab'=> $cardsTab,
      'headerTitle'=> $headerTitle
    ]);
  }

  public function show()
  {
    $mangaka = $this->db->selectById($_GET['id']);
    $headerTitle = $mangaka['first_name']. " ". $mangaka['last_name'];

    $this->views('/mangakas/show.mangakas.view.php', [
      'mangaka'=> $mangaka,
      'headerTitle'=> $headerTitle
    ]);
  }
}