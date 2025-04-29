<?php
namespace App\Models;

class ArticleModel
{
    protected $articles = [];

    // Permet de définir manuellement la liste des articles (utile pour les tests)
    public function setArticleStorage(array $storage)
    {
        $this->articles = $storage;
    }

    // Ajouter un article au stockage temporaire
    public function ajouterArticle(array $article)
    {
        $this->articles[] = $article;
    }

    // Supprimer un article par son id
    public function supprimerArticle($id)
    {
        foreach ($this->articles as $index => $article) {
            if (isset($article['id']) && $article['id'] == $id) {
                unset($this->articles[$index]);
                $this->articles = array_values($this->articles); // Réindexation
                break;
            }
        }
    }

    // Vider complètement la liste des articles
    public function viderArticles()
    {
        $this->articles = [];
    }

    // Récupérer tous les articles
    public function getArticles(): array
    {
        return $this->articles;
    }
}
