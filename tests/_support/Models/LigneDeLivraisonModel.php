<?php

namespace App\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\LigneDeLivraisonModel;

class LigneDeLivraisonModelTest extends CIUnitTestCase
{
    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new LigneDeLivraisonModel();
    }

    public function testInsertAndRetrieveLigne()
    {
        // Insert a sample row
        $data = [
            'bon_livraison_id' => 1,
            'produit_id'       => 101,
            'quantite'         => 5,
        ];
        $id = $this->model->insert($data);
        $this->assertIsInt($id);

        // Retrieve and verify
        $ligne = $this->model->find($id);
        $this->assertNotNull($ligne);
        $this->assertEquals(1, $ligne['bon_livraison_id']);
        $this->assertEquals(101, $ligne['produit_id']);
        $this->assertEquals(5, $ligne['quantite']);
    }
}