<?php

namespace App\Modules\Test\Controller;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestController extends Controller {

	public function show()
	{
		return view("Test::index");
	}

}
