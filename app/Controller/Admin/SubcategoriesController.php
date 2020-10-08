<?php

namespace App\Controller\Admin;

use Core\Alert\Alert;
use Core\HTML\BootstrapForm;

class SubcategoriesController extends AppController
{

    protected $errors = [];
    protected $success = [];

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Subcategory');
        $this->loadModel('Category');
    }

    public function index()
    {
        $subcategories = $this->Subcategory->all();
        $categories = $this->Category->all();
        $this->render('admin.subcategories.index', compact('subcategories', 'categories'));
    }

    public function add()
    {
        if (!empty($_POST)) {
            $result = $this->Subcategory->create(
                [
                    'nom' => $_POST['nom'],
                    'id_categories' => $_POST['id_categories']
                ]
            );
            $this->success[] = 'La sous-catégorie a bien été crée.';
            Alert::setAlert('success', $this->success);
            return $this->index();
        }
        $categories = $this->Category->extract('id', 'nom');
        $form = new BootstrapForm($_POST);
        $categories_names = $this->Category->extract('id', 'nom');
        $categoriesgender = $this->Category->extract('id', 'gender');
        $this->render(
            'admin.subcategories.edit',
            compact('form', 'categories', 'categoriesgender', 'categories_names')
        );
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Subcategory->update(
                $_GET['id'],
                [
                    'nom' => $_POST['nom'],
                    'id_categories' => $_POST['id_categories']
                ]
            );
            $this->success[] = 'La sous-catégorie a bien été éditée.';
            Alert::setAlert('success', $this->success);
            return $this->index();
        }
        $subcategories = $this->Subcategory->all();
        $categories = $this->Category->all();

        $subcategory = $this->Subcategory->find($_GET['id']);
        $categories_names = $this->Category->extract('id', 'nom');
        $categoriesgender = $this->Category->extract('id', 'gender');
        $form = new BootstrapForm($subcategory);
        $this->render(
            'admin.subcategories.edit',
            compact('form', 'categories_names', 'categoriesgender', 'subcategories', 'categories')
        );
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Subcategory->delete(
                $_POST['id']
            );
            if ($result) {
                $this->success[] = 'La sous-catégorie a bien été supprimée.';
                Alert::setAlert('success', $this->success);
                $this->index();
            }
        }
    }
}
