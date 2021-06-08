<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product_list';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'price', 'quantity', 'description', 'image'];

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

    public function getAllProducts()
    {
        return $this->findAll();
    }
}
