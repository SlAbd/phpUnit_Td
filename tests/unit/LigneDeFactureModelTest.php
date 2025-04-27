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
}