<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order_list';
    protected $useTimestamps = true;
    protected $allowedFields = ['order_id', 'user_email', 'product_id', 'duration_in_days', 'status'];

    public function insertNewOrder($data)
    {
        $this->insertBatch($data);
    }

    public function getOrderByOrderId($orderId)
    {
        return $this->where(['order_id' => $orderId])->first();
    }

    public function getOrdersByOrderId($orderId)
    {
        return $this->where('order_id', $orderId)->findAll();
    }

    public function getAllOrders()
    {
        /**
         * SELECT ol.*, GROUP_CONCAT(pl.name) AS product_name, GROUP_CONCAT(pl.price) AS product_price, SUM(pl.price) AS total_price
         * FROM order_list ol
         * INNER JOIN product_list pl ON ol.product_id = pl.id
         * GROUP BY ol.order_id
         * ORDER BY ol.created_at ASC;
         */
        return $this->select('order_list.*, GROUP_CONCAT(product_list.name) AS product_name, GROUP_CONCAT(product_list.price) AS product_price, SUM(product_list.price) AS total_price')
            ->join('product_list', 'order_list.product_id = product_list.id')
            ->groupBy('order_list.order_id')
            ->orderBy('order_list.created_at', 'ASC')
            ->findAll();
    }

    public function getOrderByUserEmail($email)
    {
        /**
         * SELECT ol.*, GROUP_CONCAT(pl.name) AS product_name, GROUP_CONCAT(pl.price) AS product_price, SUM(pl.price) AS total_price
         * FROM order_list ol
         * INNER JOIN product_list pl ON ol.product_id = pl.id
         * WHERE user_email = 'dimas@umn.ac.id'
         * GROUP BY ol.order_id
         * ORDER BY ol.created_at ASC;
         */
        return $this->select('order_list.*, GROUP_CONCAT(product_list.name) AS product_name, GROUP_CONCAT(product_list.price) AS product_price, SUM(product_list.price) AS total_price')
            ->join('product_list', 'order_list.product_id = product_list.id')
            ->where(['user_email' => $email])
            ->groupBy('order_list.order_id')
            ->orderBy('order_list.created_at', 'ASC')
            ->findAll();
    }

    public function countOrders()
    {
        return $this->select('COUNT(DISTINCT order_id)')->first();
    }

    public function getTotalIncome()
    {
        /**
         * SELECT SUM(pl.price) AS total_price
         * FROM order_list ol
         * INNER JOIN product_list pl ON ol.product_id = pl.id;
         */

        return $this->selectSum('price')
            ->join('product_list', 'order_list.product_id = product_list.id')
            ->first();
    }

    public function changeOrderStatus($data)
    {
        $this->updateBatch($data, 'order_id');
    }
}
