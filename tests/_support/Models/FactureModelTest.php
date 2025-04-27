<?php

namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\FactureModel;

class FactureModelTest extends TestCase
{
    public function testAjouterArticleEtCalculerTotal()
    {
        // Imaginons que FactureModel gère une facture simple avec des articles ajoutés.
        $facture = new FactureModel();

        // Simuler l'ajout d'articles (exemple : 2 produits)
        $facture->ajouterArticle('Produit A', 2, 100); // 2 articles à 100 DH
        $facture->ajouterArticle('Produit B', 1, 150); // 1 article à 150 DH

        // Récupérer les articles
        $articles = $facture->getArticles();

        // Vérifier qu'on a bien 2 lignes
        $this->assertCount(2, $articles, "La facture doit contenir 2 articles");

        // Calculer le total
        $total = $facture->calculerTotal();

        // 2×100 + 1×150 = 350
        $this->assertEquals(350, $total, "Le total doit être 350 DH");
    }

    public function testFactureVide()
    {
        $facture = new FactureModel();

        $articles = $facture->getArticles();
        $this->assertEmpty($articles, "La facture doit être vide au début");

        $total = $facture->calculerTotal();
        $this->assertEquals(0, $total, "Le total d'une facture vide doit être 0");
    }
}
