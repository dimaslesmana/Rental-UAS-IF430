<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'user_carts';
    protected $allowedFields = ['uid', 'product_id'];

    public function insertNewCart($data)
    {
        $this->save([
            'uid' => $data['uid'],
            'product_id' => $data['product_id'],
        ]);
    }

    public function getAllCarts()
    {
        return $this->findAll();
    }

    public function getCart($uid, $product_id)
    {
        return $this->where(['uid' => $uid])->where(['product_id' => $product_id])->first();
    }

    public function getCartByUid($uid)
    {
        /**
         * SELECT uc.id AS cart_id, uc.uid, pl.*
         * FROM user_carts uc
         * INNER JOIN product_list pl ON uc.product_id = pl.id
         * WHERE uc.uid = 'uid';
         */
        return $this->select('user_carts.id AS cart_id, user_carts.uid, product_list.*')
            ->join('product_list', 'user_carts.product_id = product_list.id')
            ->where(['user_carts.uid' => $uid])->findAll();
    }

    public function deleteCartById($id)
    {
        $this->delete($id);
    }

    public function deleteCartByUid($uid)
    {
        $this->where('uid', $uid)->delete();
    }
}
