<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

  public function index()
  {
    $orders = Order::query()->get();
    return response()->json($orders,200);
  }

<<<<<<< 83179ce5584507dc6f7ebeecf2dbf8727a1e4026
  public function store(Request $request, $id)
   {
        

   }
=======
  public function store(Request $request)
    {
      $order = new Order([
        'name' => $request->get('name'),
        'image' => $request->get('image'),
        'price' => $request->get('price'),
        'qty' => $request->get('qty')
      ]);

      $order->save();

      return response()->json('success');
    }
>>>>>>> make add and wish button
}
