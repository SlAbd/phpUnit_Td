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
}