<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArticleModel;

class ArticleController extends Controller
{
    public function index()
    {
        $model = new ArticleModel();
        $data['articles'] = $model->findAll();
        return view('article_list', $data);
    }

    public function create()
    {
        return view('create_article');
    }

    public function save()
    {
        $model = new ArticleModel();
        if ($this->validate([
            'reference' => 'required|min_length[3]',
            'nom' => 'required',
            'prix_unitaire' => 'required|numeric',
        ])) {
            $data = [
                'reference' => $this->request->getVar('reference'),
                'nom' => $this->request->getVar('nom'),
                'prix_unitaire' => $this->request->getVar('prix_unitaire'),
            ];
            $model->save($data);
            return redirect()->to(base_url('article'));
        } else {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id)
    {
        $model = new ArticleModel();
        $article = $model->find($id);
        if (!$article) {
            return redirect()->to(base_url('article'))->with('error', 'Article not found');
        }
        $data['article'] = $article;
        return view('edit_article', $data);
    }

    public function update($id)
    {
        $model = new ArticleModel();
        if ($this->validate([
            'reference' => 'required|min_length[3]',
            'nom' => 'required',
            'prix_unitaire' => 'required|numeric',
        ])) {
            $data = [
                'reference' => $this->request->getVar('reference'),
                'nom' => $this->request->getVar('nom'),
                'prix_unitaire' => $this->request->getVar('prix_unitaire'),
            ];
            $model->update($id, $data);
            return redirect()->to(base_url('article'));
        } else {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        $model = new ArticleModel();
        $model->delete($id);
        return redirect()->to(base_url('article'));
    }
}
