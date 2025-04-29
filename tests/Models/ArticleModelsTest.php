<?php
namespace Tests\Support\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\ArticleModel;

class ArticleModelTest extends CIUnitTestCase
{
    protected $articleModel;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer une instance du modèle
        $this->articleModel = new ArticleModel();

        // Initialiser le stockage temporaire
        $this->articleModel->setArticleStorage([]);
    }

    public function testAjouterArticle()
    {
        $article = [
            'id' => 1,
            'reference' => 'REF123',
            'nom' => 'Article Test',
            'prix_unitaire' => 50
        ];

        $this->articleModel->ajouterArticle($article);

        $articles = $this->articleModel->getArticles();
        $this->assertCount(1, $articles);
        $this->assertEquals($article, $articles[0]);
    }

    public function testSupprimerArticle()
    {
        $article = [
            'id' => 1,
            'reference' => 'REF123',
            'nom' => 'Article Test',
            'prix_unitaire' => 50
        ];

        $this->articleModel->ajouterArticle($article);
        $this->articleModel->supprimerArticle(1);

        $articles = $this->articleModel->getArticles();
        $this->assertCount(0, $articles);
    }

    public function testViderArticles()
    {
        $article = [
            'id' => 1,
            'reference' => 'REF123',
            'nom' => 'Article Test',
            'prix_unitaire' => 50
        ];

        $this->articleModel->ajouterArticle($article);
        $this->articleModel->viderArticles();

        $articles = $this->articleModel->getArticles();
        $this->assertCount(0, $articles);
    }
}
