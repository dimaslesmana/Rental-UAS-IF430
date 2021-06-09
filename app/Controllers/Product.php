<?php

namespace App\Controllers;

class Product extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "U-Rental | Rents",
			'products' => $this->productModel->getAllProductsPaginate(),
			'pager' => $this->productModel->pager,
		];

		return view('product/index', $data);
	}

	public function detail($id = null)
	{
		// return if id is not provided
		if (empty($id)) {
			return redirect()->to('/rents');
		}

		$product = $this->productModel->getProductById($id);

		if (empty($product)) {
			return redirect()->to('/rents');
		}

		$data = [
			'title' => "U-Rental | {$product['name']}",
			'product' => $product,
			'products' => $this->productModel->getRandomFourHotelExcept($id),
		];

		return view('product/detail', $data);
	}

	public function cart()
	{
		$uid = session()->get('uid');

		$data = [
			'title' => "U-Rental | My Cart",
			'carts' => $this->cartModel->getCartByUid($uid),
			'custom_js' => [
				view('custom-js/cart'),
			],
		];

		return view('product/cart', $data);
	}

	/**
	 * * Handle add to cart request
	 */
	public function addToCart()
	{
		$product_id = htmlspecialchars($this->request->getPost('product_id'), ENT_QUOTES, 'UTF-8');

		$uid = session()->get('uid');
		$cart = $this->cartModel->getCart($uid, $product_id);

		// Check if user already have this product_id in cart
		if (!is_null($cart)) {
			return redirect()->to('/rents');
		}

		$data = [
			'uid' => $uid,
			'product_id' => $product_id,
		];

		$this->cartModel->insertNewCart($data);

		return redirect()->to('/rents/cart');
	}

	/**
	 * * Handle delete cart request
	 */
	public function deleteCart($id = null)
	{
		if (empty($id)) {
			return redirect()->to('/rents/cart');
		}

		$this->cartModel->deleteCartById($id);

		return redirect()->to('/rents/cart');
	}

	/**
	 * * Handle rent request
	 */
	public function checkout()
	{
		// post data
		$email = htmlspecialchars($this->request->getPost('email'), ENT_QUOTES, 'UTF-8');
		$product_id = $this->request->getPost('product_id');
		$duration_in_days = htmlspecialchars($this->request->getPost('duration_in_days'), ENT_QUOTES, 'UTF-8');

		// Check if products is available
		foreach ($product_id as $id) {
			$product = $this->productModel->getProductById($id);

			if ($product['quantity'] <= 0) {
				return redirect()->to('/rents/cart');
			}
		}
		$orderId = $this->generateOrderId();

		foreach ($product_id as $i => $id) {
			$data[$i]['order_id'] = $orderId;
			$data[$i]['user_email'] = $email;
			$data[$i]['product_id'] = $id;
			$data[$i]['duration_in_days'] = $duration_in_days;
			$data[$i]['status'] = 'sedang_dikirim';
		}

		$uid = session()->get('uid');
		$this->cartModel->deleteCartByUid($uid);
		$this->orderModel->insertNewOrder($data);

		// Update product quantity
		$products = $this->productModel->getProductsById($product_id);

		foreach ($product_id as $i => $id) {
			$dataToUpdate[$i]['id'] = $id;
			$dataToUpdate[$i]['quantity'] = $products[$i]['quantity'] - 1;
		}
		$this->productModel->updateProductQuantity($dataToUpdate);

		return redirect()->to('/rents');
	}

	/**
	 * * Generate random order id
	 */
	private function generateOrderId()
	{
		// Loop generate random numeric string
		while (true) {
			$orderId = random_string('numeric', 10);
			$result = $this->orderModel->getOrderByOrderId($orderId);

			if (is_null($result)) {
				// no record found, then no duplicate booking id found
				return $orderId;
			}
		}
	}
}
