<?php

namespace App\Controller;

use Core\Controller\Controller;

class ProductsController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Product');
        $this->loadModel('Subcategory');
        $this->loadModel('Category');
    }

    public function index(){
        $products = $this->Product->last();
        $subcategories = $this->Subcategory->all();
        $categories = $this->Category->all();
        $this->render('products.index', compact('products', 'subcategories', 'categories'));
    }

    public function subcategory(){
        $subcategory = $this->Subcategory->find($_GET['id']);
        if ($subcategory === false) {
            $this->notFound();
        }
        $products = $this->Product->lastBySubcategory($_GET['id']);
        $subcategories = $this->Subcategory->all();
        $categories = $this->Category->all();
        $this->render('products.subcategory', compact('products', 'subcategories', 'subcategory', 'categories'));
    }

    public function category()
    {
        $category = $this->Category->find($_GET['id']);
        if ($category === false) {
            $this->notFound();
        }
        $products = $this->Product->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $subcategories = $this->Subcategory->all();
        $this->render('products.category', compact('products', 'categories', 'category', 'subcategories'));
    }

    public function show(){
        $product = $this->Product->findWithSubcategory($_GET['id']);
        $categories = $this->Category->all();
        $subcategories = $this->Subcategory->all();
        $this->render('products.show', compact('product','categories', 'subcategories'));
    }
}