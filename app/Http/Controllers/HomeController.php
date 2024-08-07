<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Orders;
use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    if(Auth::id()) {
        return $this->redirects();
    }

    $data = Food::all();
    $data2 = Foodchef::all();
    return view('home', compact("data", "data2"));
}


    public function redirects()
{
    $data = food::all();
    $data2 = foodchef::all();
    $id = Auth::user()->id; // Get the authenticated user's ID

    if ($id == 1) { // Compare as an integer, not a string
        return view('adminhome');
    } else {
        $userid = Auth::id();
        $count = cart::where('user_id', $userid)->count();
        return view('home', compact('data', 'data2', 'count'));
    }
}


    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $userid=Auth::id();
            $foodid=$id;
            $quantity=$request->quantity;

            $cart= new cart;
            $cart->user_id= $userid;
            $cart->food_id= $foodid;
            $cart->quantity= $quantity;
            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id)
{
    // Ensure the user is authenticated
    if (Auth::id() == $id) {
        // Get the number of items in the cart for the user
        $count = Cart::where('user_id', $id)->count();

        // Retrieve cart items and related food information
        $data = Cart::where('user_id', $id)
                    ->join('food', 'carts.food_id', '=', 'food.id')
                    ->select('carts.id as cart_id', 'food.title', 'food.price', 'carts.quantity')
                    ->get();

        // Return the view with the retrieved data
        return view('showcart', compact('count', 'data'));
    } else {
        return redirect()->back()->with('error', 'Unauthorized access.');
    }
}


public function removefromCart($id)
{
    $data = Cart::find($id);

    $data->delete();
     return redirect()->back();
    }

    public function orderconfirm(Request $request)
{
   foreach($request->foodname ?? [] as $key => $foodname)
   {
    $data=new Orders;
    $data->foodname= $foodname;
    $data->price= $request->price[$key];
    $data->quantity= $request->quantity[$key];

    $data->name= $request->name;
    $data->phone= $request->phone;
    $data->address= $request->address;

    $data->save();
   }
   return redirect()->back();
    }
}

