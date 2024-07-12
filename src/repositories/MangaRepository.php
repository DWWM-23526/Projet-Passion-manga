<?php

namespace repositories;

use models\Manga;

class MangaRepository extends BaseRepository
{
    private string $table = 'mangas';
    private string $idTable = "Id_manga";

   
    // BASIC CRUD

    public function getAllMangas()
    {
        $result = $this->getAll($this->table);
        return array_map(fn ($data) => new Manga($data), $result);
    }

    public function getMangaById(int $id)
    {
        $result = $this->getById($this->table, $this->idTable, $id);
        return $result ? new Manga($result) : null;
    }


    public function createManga(Manga $manga)
    {
        $query = "INSERT INTO mangas(
                    Id_manga, 
                    img_manga, 
                    manga_name, 
                    edition,
                    total_tome_number, 
                    year_release, 
                    tome_number, 
                    texte, 
                    Id_mangaka) 
                VALUES (
                    :Id_manga, 
                    :img_manga, 
                    :manga_name, 
                    :edition, 
                    :total_tome_number, 
                    :year_release, 
                    :tome_number, 
                    :texte, 
                    :Id_mangaka)";

        $values = Manga::toArray($manga);

        try {
            $this->save($query, $values);
        } catch (\PDOException $e) {
            throw new \Exception('error on manga insert' . $e->getMessage());
        }
    }

    public function updateManga(Manga $manga)
    {

        $query = "UPDATE mangas 
              SET img_manga = :img_manga, 
                  manga_name = :manga_name, 
                  edition = :edition, 
                  total_tome_number = :total_tome_number, 
                  year_release = :year_release, 
                  tome_number = :tome_number, 
                  texte = :texte, 
                  Id_mangaka = :Id_mangaka
              WHERE Id_manga = :Id_manga";

        $values = [
            'Id_manga' => $manga->Id_manga,
            'img_manga' => $manga->img_manga,
            'manga_name' => $manga->manga_name,
            'edition' => $manga->edition,
            'total_tome_number' => $manga->total_tome_number,
            'year_release' => $manga->year_release,
            'tome_number' => $manga->tome_number,
            'texte' => $manga->texte,
            'Id_mangaka' => $manga->Id_mangaka,
        ];

        try {
            $this->save($query, $values);
        } catch (\PDOException $e) {
            throw new \Exception('Erreur lors de la mise à jour du manga: ' . $e->getMessage());
        }
    }

    // public function deleteManga($id)
    // {
    //     $this->delete($this->table, $this->idTable, $id);
        
    // }

    // OTHER

    public function getMangasByTagID(int $id)
    {
        $result = $this->db->query('SELECT mangas.* , tags.tag_name  FROM mangas
        JOIN tags_manga on tags_manga.Id_manga = mangas.Id_manga
        JOIN tags on tags.Id_tag = tags_manga.Id_tag
        WHERE tags.Id_tag = :id', ['id' => $id])->fetchAll();

        return array_map(fn ($data) => new Manga($data), $result);
    }

    public function searchByStringManga(string $searchTerm)
    {
        $result = $this->db->query(
            "SELECT * FROM $this->table WHERE manga_name LIKE :searchTerm",
            ['searchTerm' => "%$searchTerm%"]
        )->fetchAll();
        return array_map(fn ($data) => new Manga($data), $result);
    }
}
