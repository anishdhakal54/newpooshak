<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Repositories\Product\ProductRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * @var ProductRepository
     */
    private $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
      $usercart=  CartProduct::where('user_id',Auth::user()->id)->get();
      dd($usercart);
        return view('cart.index',compact('usercart'));
    }

    public function store(CartRequest $request)
    {

        // dd($request->all());
        $productId = $request->input('product');
        $quantity = $request->input('quantity');
        $quantity_3xl = $request->input('quantity_3xl');
        $quantity_2xl = $request->input('quantity_2xl');
        $quantity_xl = $request->input('quantity_xl');
        $quantity_m = $request->input('quantity_m');
        $quantity_s = $request->input('quantity_s');
        $quantity_xs = $request->input('quantity_xs');
        $has_frame = $request->input('has_frame');
        $place = $request->input('place');
        $product = $this->product->getById($productId);
        $price = $this->getProductPrice($product);
        $color_no=$request->input('color_no');
        $imagename=$request->input('imagename');


//        dd($color_no);

//        $place = $request->input('place');

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $quantity,
            'price' => $price,
            'options' => [
                'quantity_xl' => $quantity_xl,
                'quantity_2xl' => $quantity_2xl,
                'quantity_3xl' => $quantity_3xl,
                'quantity_m' => $quantity_m,
                'quantity_s' => $quantity_s,
                'quantity_xs' => $quantity_xs,
                'has_frame' => $has_frame,
                'place' => $place,
                'color_no'=>$color_no,
                'imagename'=>$imagename,


            ]
        ]);

        if (!$request->ajax()) {
            $notify = json_notification('success', 'Success', 'Add to cart successfully', 'linecons-Like');
            $this->emit('notification', $notify);
            $this->emit('rerenderHeader');
            return redirect()->back()->with('success', 'Product added to cart!!');
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product successfully added to cart.'
        ], 200);
    }

    public function update(Request $request)
    {

        foreach ($request->input('cartContents') as $cartContent) {
            $rowId = $cartContent['rowId'];
            $quantity = $cartContent['quantity'];

            // Update the quantity
            Cart::update($rowId, $quantity);
        }
        return redirect()->back()->with('success', 'Product added to cart!!');


        return response()->json([
            'status' => 'success',
            'message' => 'Cart successfully updated.'
        ], 200);
    }

    public function destroyRow($rowId)
    {
        Cart::remove($rowId);

        return response()->json([
            'status' => 'success',
            'message' => 'Product successfully removed from cart.'
        ], 200);
    }

    public function destroy()
    {
        Cart::destroy();

        return response()->json([
            'status' => 'success',
            'message' => 'Cart successfully cleared.'
        ], 200);
    }

    public function getMiniCart()
    {
        $cartContents = Cart::content();
        $cartTotal = Cart::total();
        return view('cart.mini-cart', compact('cartContents', 'cartTotal'));
    }

    protected function getProductPrice($product)
    {
        return isset($product->prices->first()->sale_price) ? $product->prices->first()->sale_price : $product->prices->first()->regular_price;
    }
    public function getcheckout(){
        return view('livewire.checkout');
    }
}
