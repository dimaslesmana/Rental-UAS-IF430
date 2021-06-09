<?php

namespace App\Controllers;

class Order extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login');
        }

        return redirect()->to('/order/rents');
    }

    public function orderList()
    {
        $email = session()->get('email');
        $orderList = $this->orderModel->getOrderByUserEmail($email);

        $data = [
            'title' => "U-Rental | My Rents",
            'rent_list' => $orderList,
        ];

        return view('order/rent-list', $data);
    }

    /**
     * * Handle change order status request
     */
    public function changeRentStatus()
    {
        // post data
        $orderId = htmlspecialchars($this->request->getPost('order_id'), ENT_QUOTES, 'UTF-8');
        $orderStatus = htmlspecialchars($this->request->getPost('order_status'), ENT_QUOTES, 'UTF-8');

        $orders = $this->orderModel->getOrdersByOrderId($orderId);

        if (is_null($orders)) {
            return redirect()->to('/');
        }

        // Change order status
        foreach ($orders as $i => $order) {
            $data[$i]['order_id'] = $order['order_id'];
            $data[$i]['status'] = $orderStatus;
        }

        $this->orderModel->changeOrderStatus($data);

        switch ($orderStatus) {
            case 'sudah_dikirim':
                return redirect()->to('/dashboard/orders');
            case 'siap_di_pickup':
                return redirect()->to('/order/rents');
            case 'selesai':
                foreach ($orders as $i => $order) {
                    $product_id[$i] = $order['product_id'];
                }
                // Update product quantity
                $products = $this->productModel->getProductsById($product_id);

                foreach ($product_id as $i => $id) {
                    $dataToUpdate[$i]['id'] = $id;
                    $dataToUpdate[$i]['quantity'] = $products[$i]['quantity'] + 1;
                }

                $this->productModel->updateProductQuantity($dataToUpdate);

                return redirect()->to('/dashboard/orders');
        }
    }
}
