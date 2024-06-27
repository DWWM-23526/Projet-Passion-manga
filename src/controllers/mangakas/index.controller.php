<?php


$titlePage = 'Mangakas';

$cardsTab = [
  [
    'img' => '/assets/img/masashi_kishimoto.jpg',
    'text' => 'Masashi Kishimoto',
    'alt' => 'Mangaka of Naruto',
  ],
  [
    'img' => '/assets/img/akira_toriyama.jpg',
    'text' => 'Akira Toriyama',
    'alt' => 'Mangaka of Dragon Ball',
  ],
  [
    'img' => '/assets/img/eichiro_oda.jpg',
    'text' => 'Eiichiro Oda',
    'alt' => 'Mangaka of One Piece',
  ],
  [
    'img' => '/assets/img/hirohiko_araki.jpg',
    'text' => 'Hirohiko Araki',
    'alt' => 'Mangaka of JoJo\'s Bizarre Adventure',
  ]
];

require __DIR__ . '/../../views/mangakas/index.view.php';
