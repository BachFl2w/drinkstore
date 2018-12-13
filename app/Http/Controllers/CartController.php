<?php

namespace App\Http\Controllers;

use App\Cart1;
use App\Product;
use App\Size;
use App\Topping;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrderRequest;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Repository;
use App\Order;
use App\OrderDetail;

class Cart1Controller extends Controller
{
    protected $orderModel;
    protected $orderDetailModel;

    function __construct(Order $orderModel, OrderDetail $orderDetailModel)
    {
        $this->orderModel = new Repository($orderModel);
        $this->orderDetailModel = new Repository($orderDetailModel);
    }

    public function cart()
    {
        $data = [];
        if (Session::has('cart')) {
            $data = Session('cart');
        }

        return response()->json($data);
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product);

        $size = Size::findOrFail($request->size);

        if ($request->toppings) {
            $toppings = Topping::findOrFail($request->toppings);
        } else {
            $toppings = null;
        }

        $image_main = Image::where('product_id', $request->product)
            ->orderBy('active', 'desc')
            ->orderBy('id', 'desc')->first();

        $product->image = $image_main->name;

        $cart = new Cart1();

        $cart->addProduct($product, $toppings, $size);
    }

    public function delete(Request $request)
    {
        $cart = new Cart1();

        $cart->removeItem($request->key);

        return redirect()->route('client.showCart');
    }

    public function removeAll()
    {
        $cart = new Cart1();

        $cart->removeAll();

        return redirect()->route('client.showCart');
    }

    public function checkout(OrderRequest $request)
    {
        $cart = session('cart');

        $id = null;
        if (Auth::id()) {
            $id = Auth::id();
        }

        $now = new DateTime();

        $order = $this->orderModel->create([
            'receiver' => $request->name,
            'user_id' => $id,
            'order_time' => $now->format('Y-m-d H:i:s'),
            'order_place' => $request->order_place,
            'order_phone' => $request->order_phone,
            'status' => 0,
            'note' => $request->note,
        ]);

        foreach ($cart->items as $key => $value) {
            $orderDetail = $this->orderDetailModel->create([
                'product_id' => $cart->items[$key]['product']->id,
                'product_price' => $cart->items[$key]['product']->price,
                'order_id' => $order->id,
                'size_id' => $cart->items[$key]['size']->id,
                'quantity' => $cart->items[$key]['qty'],
            ]);

            if ($value['topping']) {
                foreach ($value['topping'] as $k => $v) {
                    $orderDetail->toppings()->attach([
                        'topping_price' => $v->price,
                    ], $v->id
                    );
                }
            }
        }
        Session::forget('cart');
    }
}
