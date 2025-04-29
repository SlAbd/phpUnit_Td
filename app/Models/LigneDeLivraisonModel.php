<?php

namespace App\Models;

use CodeIgniter\Model;

class LigneDeLivraisonModel extends Model
{
    protected $table = 'lignedeliv';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'bon_livraison_id',
        'produit_id',
        'quantite',
    ];

    // Get all lignes de livraison for a specific bon de livraison
    public function getByBonLivraison($bonLivraisonId)
    {
        return $this->where('bon_livraison_id', $bonLivraisonId)->findAll();
    }

    // Get total quantity delivered for a specific product
    public function getTotalQuantiteByProduit($produitId)
    {
        return $this->selectSum('quantite')
                    ->where('produit_id', $produitId)
                    ->first();
    }

    // Delete all lignes by bon_livraison_id
    public function deleteByBonLivraison($bonLivraisonId)
    {
        return $this->where('bon_livraison_id', $bonLivraisonId)->delete();
    }

    // Update quantity for a given ligne de livraison ID
    public function updateQuantite($id, $nouvelleQuantite)
    {
        return $this->update($id, ['quantite' => $nouvelleQuantite]);
    }
}
