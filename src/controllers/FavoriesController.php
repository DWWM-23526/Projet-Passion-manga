<?php
namespace controllers;
use controllers\Controller;


class FavoriesController extends Controller
{

    public function index()
    {
        $headerTitle = 'FAVORIES';

        $this->render('/favories/favories.view.php',[
            'headerTitle' => $headerTitle
        ]);

    }
}
