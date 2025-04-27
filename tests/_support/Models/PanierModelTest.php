<?php
namespace Tests\Support\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\PanierModel;

class PanierModelTest extends CIUnitTestCase
{
    protected $panierModel;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer une instance du modèle
        $this->panierModel = new PanierModel();

        // Remplacer temporairement le stockage de session par un tableau pour simuler les données
        $this->panierModel->setPanierStorage([]);
    }

    public function testAjouterArticle()
    {
        $article = [
            'product_id' => 1,
            'quantite' => 2,
            'prix' => 100
        ];

        // Ajouter un article au panier
        $this->panierModel->ajouterArticle($article);

        // Vérifier que le panier contient un article
        $panier = $this->panierModel->getPanier();
        $this->assertCount(1, $panier);
        $this->assertEquals($article, $panier[0]);
    }

    public function testSupprimerArticle()
    {
        $article = [
            'product_id' => 1,
            'quantite' => 2,
            'prix' => 100
        ];

        // Ajouter l'article
        $this->panierModel->ajouterArticle($article);

        // Supprimer l'article
        $this->panierModel->supprimerArticle(1);

        // Vérifier que le panier est vide après la suppression
        $panier = $this->panierModel->getPanier();
        $this->assertCount(0, $panier);
    }

    public function testViderPanier()
    {
        // Ajouter un article
        $article = [
            'product_id' => 1,
            'quantite' => 2,
            'prix' => 100
        ];
        $this->panierModel->ajouterArticle($article);

        // Vider le panier
        $this->panierModel->viderPanier();

        // Vérifier que le panier est vide après le vidage
        $panier = $this->panierModel->getPanier();
        $this->assertCount(0, $panier);
    }
}

