<?php
namespace App\Models;

use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table = 'panier';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'quantite', 'prix'];

    protected $panierStorage = [];

    public function setPanierStorage(array $storage)
    {
        $this->panierStorage = $storage;
    }

    public function ajouterArticle(array $article)
    {
        $this->panierStorage[] = $article;
    }

    public function getPanier(): array
    {
        return $this->panierStorage;
    }

    public function supprimerArticle($product_id)
    {
        foreach ($this->panierStorage as $index => $article) {
            if ($article['product_id'] == $product_id) {
                unset($this->panierStorage[$index]);
                $this->panierStorage = array_values($this->panierStorage);
                break;
            }
        }
    }

    public function viderPanier()
    {
        $this->panierStorage = [];
    }
}
