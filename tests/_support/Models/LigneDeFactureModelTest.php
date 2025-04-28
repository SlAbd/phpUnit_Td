<?php

namespace Tests;

use App\Models\LigneDeFactureModel;
use CodeIgniter\Test\CIUnitTestCase;

class LigneDeFactureModelTest extends CIUnitTestCase
{
    public function testInsertAndFind()
    {
        $model = new LigneDeFactureModel();

        $data = [
            'facture_id'    => 1,
            'produit_id'    => 2,
            'quantite'      => 5,
            'prix_unitaire' => 100,
        ];

        $id = $model->insert($data);
        $this->assertIsInt($id);

        $found = $model->find($id);
        $this->assertNotNull($found);
        $this->assertEquals($data['quantite'], $found['quantite']);
    }

    public function testGetByFacture()
    {
        $model = new LigneDeFactureModel();

        $factureId = 1;
        $results = $model->getByFacture($factureId);

        $this->assertIsArray($results);
    }

    public function testGetByProduit()
    {
        $model = new LigneDeFactureModel();

        $produitId = 2;
        $results = $model->getByProduit($produitId);

        $this->assertIsArray($results);
    }

    public function testUpdateQuantite()
    {
        $model = new LigneDeFactureModel();

        $data = [
            'facture_id'    => 2,
            'produit_id'    => 3,
            'quantite'      => 2,
            'prix_unitaire' => 150,
        ];

        $id = $model->insert($data);
        $this->assertIsInt($id);

        $updateResult = $model->updateQuantite($id, 10);
        $this->assertTrue($updateResult);

        $updated = $model->find($id);
        $this->assertEquals(10, $updated['quantite']);
    }
}