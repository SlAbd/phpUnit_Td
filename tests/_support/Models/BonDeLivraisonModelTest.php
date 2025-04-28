<?php

namespace Tests;

use App\Models\BonDeLivraisonModel;
use CodeIgniter\Test\CIUnitTestCase;

class BonDeLivraisonModelTest extends CIUnitTestCase
{
    public function testInsertAndFind()
    {
        $model = new BonDeLivraisonModel();

        $data = [
            'commande_id'    => 3,
            'date_livraison' => '2025-04-27',
            'statut'         => 'en attente',
        ];

        $id = $model->insert($data);
        $this->assertIsInt($id);

        $found = $model->find($id);
        $this->assertNotNull($found);
        $this->assertEquals($data['statut'], $found['statut']);
    }
}