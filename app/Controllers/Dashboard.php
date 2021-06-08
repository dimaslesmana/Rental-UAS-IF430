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
			'user_count' => $this->userModel->countUser(),
			'custom_js' => [
				view('custom-js/admin-index')
			],
		];

		return view('dashboard/index', $data);
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
}
