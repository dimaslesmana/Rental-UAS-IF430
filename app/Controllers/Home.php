<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "U-Rental",
		];

		return view('home/index', $data);
	}
}
