<?php

namespace App\Models;

use CodeIgniter\Model;

class BonDeLivraisonModel extends Model
{
    protected $table = 'bondelivraison';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'commande_id',
        'date_livraison',
        'statut',
    ];

     # Get delivery notes by status.
    public function getByStatus(string $status)
    {
        return $this->where('statut', $status)->findAll();
    }

    #Get delivery notes by commande ID.
    public function getByCommandeId(int $commandeId)
    {
        return $this->where('commande_id', $commandeId)->findAll();
    }

     #Set a delivery note as completed.
    public function complete(int $id)
    {
        return $this->update($id, ['statut' => 'completed']);
    }

    #Get today's delivery notes.
    public function getTodayDeliveries()
    {
        return $this->where('date_livraison', date('Y-m-d'))->findAll();
    }
}