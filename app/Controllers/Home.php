<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "U-Rental",
			'products' => $this->productModel->getAllProductsRandom(8),
		];

		return view('home/index', $data);
	}
}
