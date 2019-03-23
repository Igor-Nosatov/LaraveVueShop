<?php

namespace App\Http\Controllers;

use App\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
  public function index()
  {
		$data['checkout'] = Checkout::query()->get();
		return response()->json($data,200);
	}

  public function store(Request $request)
    {
       $checkout = new Checkout([
        'name' => $request->get('name'),
        'price' => $request->get('price'),
        'total' => $request->get('total')
      ]);

      $checkout->save();

      return response()->json('success');
    }
}
