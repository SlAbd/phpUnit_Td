<?php

namespace App\Models;

use CodeIgniter\Model;

class FactureModel extends Model
{
    private $articles = [];

    public function ajouterArticle($nom, $quantite, $prix)
    {
        $this->articles[] = [
            'nom' => $nom,
            'quantite' => $quantite,
            'prix' => $prix,
        ];
    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function calculerTotal()
    {
        $total = 0;
        foreach ($this->articles as $article) {
            $total += $article['quantite'] * $article['prix'];
        }
        return $total;
    }
}
