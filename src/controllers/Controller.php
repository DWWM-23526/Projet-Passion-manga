<?php
namespace controllers;

class Controller {

    private function basePath($path){
        return '/../' . $path;
    }

    protected function views(string $path, array $atributes = []) {
        extract($atributes);
        require __DIR__ . $this->basePath('views' . $path);
    }
}