<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product_list';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name', 'price', 'quantity', 'description', 'image'];
    private static $itemPerPage = 6;

    public function insertNewProduct($data)
    {
        $this->save([
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);
    }

    public function updateProduct($data) {
        $this->save([
            'id' => $data['id'],
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);
    }

    public function deleteProduct($id)
    {
        $this->delete($id);
    }

    public function getAllProducts()
    {
        return $this->findAll();
    }

    public function getAllProductsRandom($amount = null)
    {
        if ($amount) {
            return $this->orderBy('name', 'RANDOM')->findAll($amount);
        }

        return $this->orderBy('name', 'RANDOM')->findAll();
    }

    public function getAllProductsPaginate()
    {
        return $this->paginate(self::$itemPerPage, 'products');
    }

    public function getProductById($id)
    {
        return $this->find($id);
    }

    public function getProductsById($ids)
    {
        return $this->whereIn('id', $ids)->findAll();
    }

    public function getRandomFourHotelExcept($id)
    {
        return $this->where('id !=', $id)->orderBy('name', 'RANDOM')->findAll(4);
    }

    public function updateProductQuantity($data)
    {
        $this->updateBatch($data, 'id');
    }
}
