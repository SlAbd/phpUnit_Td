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

    public function testGetByStatus()
    {
        $model = new BonDeLivraisonModel();

        $model->insert([
            'commande_id'    => 4,
            'date_livraison' => '2025-04-28',
            'statut'         => 'en attente',
        ]);

        $results = $model->getByStatus('en attente');

        $this->assertNotEmpty($results);
        $this->assertEquals('en attente', $results[0]['statut']);
    }

    public function testGetByCommandeId()
    {
        $model = new BonDeLivraisonModel();

        $commandeId = 5;
        $model->insert([
            'commande_id'    => $commandeId,
            'date_livraison' => '2025-04-28',
            'statut'         => 'livré',
        ]);

        $results = $model->getByCommandeId($commandeId);

        $this->assertNotEmpty($results);
        $this->assertEquals($commandeId, $results[0]['commande_id']);
    }

    public function testComplete()
    {
        $model = new BonDeLivraisonModel();

        $id = $model->insert([
            'commande_id'    => 6,
            'date_livraison' => '2025-04-28',
            'statut'         => 'en attente',
        ]);

        $result = $model->complete($id);
        $this->assertTrue($result);

        $updated = $model->find($id);
        $this->assertEquals('completed', $updated['statut']);
    }

    public function testGetTodayDeliveries()
    {
        $model = new BonDeLivraisonModel();

        $today = date('Y-m-d');

        $model->insert([
            'commande_id'    => 7,
            'date_livraison' => $today,
            'statut'         => 'en attente',
        ]);

        $results = $model->getTodayDeliveries();
        $this->assertNotEmpty($results);
        $this->assertEquals($today, $results[0]['date_livraison']);
    }
}