<?php

namespace models;

class Manga
{
    public int $Id_manga;
    public string $img_manga;
    public ?string $manga_name;
    public ?string $edition;
    public ?int $total_tome_number;
    public ?string $year_release;
    public ?int $tome_number;
    public ?string $texte;
    public int $Id_mangaka;

    public function  __construct(array $data = [])
    {
        $this->Id_manga = $data['Id_manga'] ?? 0;
        $this->img_manga = $data['img_manga'] ?? '';
        $this->manga_name = $data['manga_name'] ?? null;
        $this->edition = $data['edition'] ?? null;
        $this->total_tome_number = $data['total_tome_number'] ?? null;
        $this->year_release = $data['year_release'] ?? null;
        $this->tome_number = $data['tome_number'] ?? null;
        $this->texte = $data['texte'] ?? null;
        $this->Id_mangaka = $data['Id_mangaka'] ?? 0;
    }


    public static function toArray(Manga $data): array
    {
        return [
            'Id_manga' => $data->Id_manga,
            'img_manga' => $data->img_manga,
            'manga_name' => $data->manga_name,
            'edition' => $data->edition,
            'total_tome_number' => $data->total_tome_number,
            'year_release' => $data->year_release,
            'tome_number' => $data->tome_number,
            'texte' => $data->texte,
            'Id_mangaka' => $data->Id_mangaka,
        ];
    }
}
