<?php


namespace App\Table;

use Core\Table\Table;

class ProductTable extends Table
{
    protected $table = "produits";

    /**
     * Récupère les derniers produits
     * @return array
     */
    public function last()
    {
        return $this->query(
            "
        SELECT produits.id, produits.nom, produits.image_path, produits.description, produits.prix, sous_categories.nom as sous_categorie, categories.nom as categorie
        FROM produits
        LEFT JOIN sous_categories ON id_sous_categories = sous_categories.id
        LEFT JOIN categories ON id_categories = categories.id
        "
        );
    }

    /**
     * Récupère les derniers produits de la sous-catégorie demandée
     * @param $subcategory_id int
     * @return array
     */
    public function lastBySubcategory($subcategory_id)
    {
        return $this->query(
            "
        SELECT produits.id, produits.nom, produits.image_path, produits.description, produits.prix, sous_categories.nom as sous_categorie
        FROM produits
        LEFT JOIN sous_categories ON id_sous_categories = sous_categories.id
        WHERE produits.id_sous_categories = ?",
            [$subcategory_id]
        );
    }

    /**
     * Récupère les derniers produits de la catégorie demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id)
    {
        return $this->query(
            "
        SELECT produits.id, produits.nom, produits.image_path, produits.description, produits.prix, categories.gender, sous_categories.nom as sous_categorie, categories.nom as categorie
        FROM produits 
        LEFT JOIN sous_categories ON id_sous_categories = sous_categories.id
        LEFT JOIN categories ON id_categories = categories.id
        WHERE sous_categories.id_categories = ?",
            [$category_id]
        );
    }

    /**
     * Récupère un produit en liant la sous-catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function findWithSubcategory($id)
    {
        return $this->query(
            "
        SELECT produits.id, produits.nom, produits.image_path, produits.description, produits.prix, produits.id_sous_categories, sous_categories.nom as sous_categorie
        FROM produits
        LEFT JOIN sous_categories ON id_sous_categories = sous_categories.id
        WHERE produits.id = ?",
            [$id],
            true
        );
    }


}