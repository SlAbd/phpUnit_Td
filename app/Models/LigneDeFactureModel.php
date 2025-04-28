<?php

namespace App\Models;

use CodeIgniter\Model;

class LigneDeFactureModel extends Model
{
    protected $table = 'lignedefacture';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'facture_id',
        'produit_id',
        'quantite',
        'prix_unitaire',
    ];

    #Get all invoice lines by facture ID
    public function getByFacture(int $factureId)
    {
        return $this->where('facture_id', $factureId)->findAll();
    }

    #Get all invoice lines by product ID
    public function getByProduit(int $produitId)
    {
        return $this->where('produit_id', $produitId)->findAll();
    }

    #Update quantity for a specific line
    public function updateQuantite(int $id, int $quantite)
    {
        return $this->update($id, ['quantite' => $quantite]);
    }
}