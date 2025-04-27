<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FactureModel;

class FactureController extends BaseController
{
    public function index()
    {
        $model = new FactureModel();
        $data['factures'] = $model->findAll();
        return view('factures_list', $data);
    }

    public function total_is_not_null()
    {
        $model = new FactureModel();
        $data['factures'] = $model->where('total IS NOT NULL')->findAll(); 
        return view('factures_list', $data);
    }

    public function client_existe()
    {
        $model = new FactureModel();
        $data['factures'] = $model->where('client IS NOT NULL')->findAll();
        return view('factures_list', $data);
    }
}
