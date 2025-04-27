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
}