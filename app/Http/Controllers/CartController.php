<?php

namespace App\Http\Controllers;

use App\Cart;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function index()
  {
    $data['cart'] = Cart::query()->get();
    return response()->json($data,200);
  }

  public function store(Request $request)
    {
       $cart = new Cart([
        'name' => $request->get('name'),
        'image' => $request->get('image'),
        'price' => $request->get('price'),
        'qty' => $request->get('qty'),
        'user_id' => Auth::id(),
      ]);

      $cart->save();

      return response()->json('success');
    }

    public function delete($id)
    {
      $cart = Cart::find($id);

      $cart->delete();

      return response()->json('successfully deleted');
    }
}
