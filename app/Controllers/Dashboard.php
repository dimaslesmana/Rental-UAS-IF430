<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		// check user role before redirecting
		switch (session()->get('role_id')) {
			case 'R0001':
				return $this->admin();
			case 'R0002':
				return redirect()->to('/');
			default:
				return redirect()->to('/auth/login');
		};
	}

	/**
	 * * Dashboard Admin page
	 */
	private function admin()
	{

		$data = [
			'title' => "U-Rental | Dashboard - Home",
			'sidebar_title' => "U-Rental",
			'order_count' => implode('', $this->orderModel->countOrders()),
			'total_income' => implode('', $this->orderModel->getTotalIncome()),
			'user_count' => $this->userModel->countUser(),
		];

		return view('dashboard/index', $data);
	}

	public function addProduct()
	{
		$data = [
			'title' => "U-Rental | Dashboard - Add Product",
			'sidebar_title' => "U-Rental",
			'validation' => $this->validation,
			'custom_js' => [
				view('custom-js/admin-cu-product')
			],
		];

		return view('dashboard/add-product', $data);
	}

	public function editProductGet()
	{
		if (empty(old('product_id'))) {
			return redirect()->to('/dashboard/products');
		}

		$product = $this->productModel->getProductById(old('product_id'));

		$data = [
			'title' => "U-Rental | Dashboard - Edit Product",
			'sidebar_title' => "U-Rental",
			'product' => $product,
			'validation' => $this->validation,
			'custom_js' => [
				view('custom-js/admin-cu-product')
			],
		];

		return view('dashboard/edit-product', $data);
	}

	public function editProductPost()
	{
		$product_id = htmlspecialchars($this->request->getPost('product_id'), ENT_QUOTES, 'UTF-8');
		$product = $this->productModel->getProductById($product_id);

		$data = [
			'title' => "U-Rental | Dashboard - Edit Product",
			'sidebar_title' => "U-Rental",
			'product' => $product,
			'validation' => $this->validation,
			'custom_js' => [
				view('custom-js/admin-cu-product')
			],
		];

		return view('dashboard/edit-product', $data);
	}

	public function productList()
	{
		$data = [
			'title' => "U-Rental | Dashboard - Product List",
			'sidebar_title' => "U-Rental",
			'products' => $this->productModel->getAllProducts(),
			'custom_js' => [
				view('custom-js/admin-product-list')
			],
		];

		return view('dashboard/product-list', $data);
	}

	public function orderList()
	{
		$data = [
			'title' => "U-Rental | Dashboard - Order List",
			'sidebar_title' => "U-Rental",
			'orders' => $this->orderModel->getAllOrders(),
			'custom_js' => [
				view('custom-js/admin-order-list')
			],
		];

		return view('dashboard/order-list', $data);
	}

	/**
	 * * Handle add new product request
	 */
	public function newProduct()
	{
		$rules = [
			'console_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Console Name is required'
				]
			],
			'rent_price' => [
				'rules' => 'required|numeric|greater_than[0]|max_length[10]',
				'errors' => [
					'required' => 'Rent Price is required',
					'numeric' => 'Must be a number',
					'greater_than' => 'Must be greater than 0',
					'max_length' => 'Number is too long'
				]
			],
			'console_quantity' => [
				'rules' => 'required|numeric|max_length[10]',
				'errors' => [
					'required' => 'Console Quantity is required',
					'numeric' => 'Must be a number',
					'max_length' => 'Number is too long'
				]
			],
			'console_description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Console Description is required'
				]
			],
			'console_image' => [
				'rules' => 'max_size[console_image,3072]|is_image[console_image]|mime_in[console_image,image/png,image/jpg,image/jpeg]',
				'errors' => [
					'max_size' => 'Image size is too large. Max 3 MB',
					'is_image' => 'Please choose an image',
					'mime_in' => 'Please choose an image'
				]
			]
		];

		if (!$this->validate($rules)) {
			return redirect()->to('/dashboard/products/add')->withInput();
		}

		// Handle hotel image
		$image = $this->request->getFile('console_image');

		if ($image->getError() == 4) {
			// if no image uploaded
			$imageName = 'placeholder.png';
		} else {
			// image uploaded
			$imageName = $image->getRandomName();
			$image->move('assets/img/products', $imageName);
		}

		$data = [
			'name' => htmlspecialchars($this->request->getPost('console_name'), ENT_QUOTES, 'UTF-8'),
			'price' => htmlspecialchars($this->request->getPost('rent_price'), ENT_QUOTES, 'UTF-8'),
			'quantity' => htmlspecialchars($this->request->getPost('console_quantity'), ENT_QUOTES, 'UTF-8'),
			'description' => htmlspecialchars($this->request->getPost('console_description'), ENT_QUOTES, 'UTF-8'),
			'image' => $imageName,
		];

		$this->productModel->insertNewProduct($data);

		return redirect()->to('/dashboard/products');
	}

	/**
	 * * Handle update product request
	 */
	public function updateProduct()
	{
		$rules = [
			'console_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Console Name is required'
				]
			],
			'rent_price' => [
				'rules' => 'required|numeric|greater_than[0]|max_length[10]',
				'errors' => [
					'required' => 'Rent Price is required',
					'numeric' => 'Must be a number',
					'greater_than' => 'Must be greater than 0',
					'max_length' => 'Number is too long'
				]
			],
			'console_quantity' => [
				'rules' => 'required|numeric|max_length[10]',
				'errors' => [
					'required' => 'Console Quantity is required',
					'numeric' => 'Must be a number',
					'max_length' => 'Number is too long'
				]
			],
			'console_description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Console Description is required'
				]
			],
			'console_image' => [
				'rules' => 'max_size[console_image,3072]|is_image[console_image]|mime_in[console_image,image/png,image/jpg,image/jpeg]',
				'errors' => [
					'max_size' => 'Image size is too large. Max 3 MB',
					'is_image' => 'Please choose an image',
					'mime_in' => 'Please choose an image'
				]
			]
		];

		if (!$this->validate($rules)) {
			return redirect()->to('/dashboard/products/edit')->withInput();
		}

		// Handle hotel image
		$image = $this->request->getFile('console_image');
		$oldImage = $this->request->getVar('old_console_image');

		if ($image->getError() == 4) {
			// if no image uploaded, use old image
			$imageName = $oldImage;
		} else {
			// image uploaded
			$imageName = $image->getRandomName();
			$image->move('assets/img/products', $imageName);

			if (strpos($oldImage, 'placeholder') === false) {
				unlink('assets/img/products/' . $oldImage);
			}
		}

		$data = [
			'id' => htmlspecialchars($this->request->getPost('product_id'), ENT_QUOTES, 'UTF-8'),
			'name' => htmlspecialchars($this->request->getPost('console_name'), ENT_QUOTES, 'UTF-8'),
			'price' => htmlspecialchars($this->request->getPost('rent_price'), ENT_QUOTES, 'UTF-8'),
			'quantity' => htmlspecialchars($this->request->getPost('console_quantity'), ENT_QUOTES, 'UTF-8'),
			'description' => htmlspecialchars($this->request->getPost('console_description'), ENT_QUOTES, 'UTF-8'),
			'image' => $imageName,
		];

		$this->productModel->updateProduct($data);

		return redirect()->to('/dashboard/products');
	}

	/**
	 * * Handle delete product request
	 */
	public function deleteProduct($id = null)
	{
		if (empty($id)) {
			return redirect()->to('/dashboard/products');
		}

		$product = $this->productModel->getProductById($id);
		$productId = $product['id'];
		$productImage = $product['image'];

		if (strpos($productImage, 'placeholder') === false) {
			unlink('assets/img/products/' . $productImage);
		}

		$this->productModel->deleteProduct($productId);

		return redirect()->to('/dashboard/products');
	}
}
