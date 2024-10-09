<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\home;
use App\Models\User;
use App\Models\Order;
use App\Models\Reply;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Product;
use App\Models\category;
use App\Models\Checkout;
use App\Models\Location;
use App\Models\ReviewImage;
use App\Models\ProductImage;
use App\Models\ReviewSlider;
use Illuminate\Http\Request;
use App\Models\productAnotherImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ViewErrorBag;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $total_product = Product::all()->count();

            $total_order = Order::all()->count();

            $total_user = User::all()->count();

            $order = Order::all();

            $total_revenue = 0;

            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();

            $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        } else {

            $viewBag['products'] = Product::latest()->paginate(8);
            $categories = ["Couple's Bracelet", "Couple's Locket", "Couple's Ring"];
            $viewBag['products_couple'] = Product::whereIn('category', $categories)->paginate(5);
            $categories = ["Men's Bracelet", "Men's Locket", "Men's Ring","Men's Watch"];
            $viewBag['products_mens'] = Product::whereIn('category', $categories)->paginate(5);
            $categories = ["Girl's Bracelet", "Girl's Locket", "Girl's Ring","Girl's Watch","Girl's Anklet","Girl's Earring"];
            $viewBag['products_girls'] = Product::whereIn('category', $categories)->paginate(5);
            $viewBag['comment'] = Comment::latest()->get();
            $viewBag['reply'] = Reply::latest()->get();
            $viewBag['slider'] = Slider::latest()->get();
            $viewBag['reviewSlider'] = ReviewSlider::latest()->get();


            return view('home.userpage', $viewBag);
        }
    }


    public function index()
    {
        $viewBag['slider'] = Slider::latest()->get();
        $viewBag['reviewSlider'] = ReviewSlider::latest()->get();
        $viewBag['products'] = Product::latest()->paginate(8);
        $categories = ["Couple's Bracelet", "Couple's Locket", "Couple's Ring"];
        $viewBag['products_couple'] = Product::whereIn('category', $categories)->paginate(5);
        $categories = ["Men's Bracelet", "Men's Locket", "Men's Ring","Men's Watch"];
        $viewBag['products_mens'] = Product::whereIn('category', $categories)->paginate(5);
        $categories = ["Girl's Bracelet", "Girl's Locket", "Girl's Ring","Girl's Watch","Girl's Anklet","Girl's Earring"];
        $viewBag['products_girls'] = Product::whereIn('category', $categories)->paginate(5);


        // $viewBag['comment'] = Comment::latest()->get();
        // $viewBag['reply'] = Reply::latest()->get();


        return view('home.userpage', $viewBag);
    }

    /* Product Details*/

    public function product_details($id)
    {
        $viewBag['products'] = Product::where('id', $id)->first();
        $viewBag['images'] = ProductImage::where('product_id', $id)->get();
        $viewBag['detailsImage'] = productAnotherImage::where('product_id', $id)->get();
        $viewBag['reviewImage'] = ReviewImage::where('product_id', $id)->get();
        $viewBag['youtube'] = Product::get();
        $viewBag['comment'] = Comment::where('product_id', $id)->latest()->get();
        $viewBag['reply'] = Reply::latest()->get();

        return view('home.product_details', $viewBag);
    }


    // cart details

public function add_cart(Request $request, $id)
{

    // dd($request->all());
    $product = Product::find($id);

    // Check if the user is logged in
    if (Auth::check()) {
        $user = Auth::user();

        // Check if the product is already in the cart for this user
        $existingCart = Cart::where('product_id', $product->id)
                            ->where('user_id', $user->id)
                            ->first();

        if ($existingCart) {
            // Update existing cart entry
            $existingCart->quantity += $request->quantity;
            $existingCart->price = $product->discount_price ? $product->discount_price * $existingCart->quantity : $product->price * $existingCart->quantity;
            $existingCart->save();
        } else {
            // Create a new cart entry
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            $cart->price = $product->discount_price ? $product->discount_price * $request->quantity : $product->price * $request->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
        }

    } else {
        // Handle guest user
        $guestCart = session()->get('home.show_cart', []);

        // Check if the product is already in the guest cart
        if (isset($guestCart[$id])) {
            // Update existing guest cart entry
            $guestCart[$id]['quantity'] += $request->quantity;
            $guestCart[$id]['price'] = $product->discount_price ? $product->discount_price * $guestCart[$id]['quantity'] : $product->price * $guestCart[$id]['quantity'];
        } else {
            // Create a new entry in the guest cart
            $guestCart[$id] = [
                'name' => $request->input('name'), // Get name from request
                'email' => $request->input('email'), // Get email from request
                'phone' => $request->input('phone'), // Get phone from request
                'address' => $request->input('address'), // Get address from request
                'product_title' => $product->title,
                'price' => $product->discount_price ? $product->discount_price * $request->quantity : $product->price * $request->quantity,
                'image' => $product->image,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ];
        }

        // Save the guest cart back to the session
        session()->put('home.show_cart', $guestCart);
    }

    return redirect()->back()->with('success', 'Product added to cart successfully!');
}



public function show_cart()
{
    $viewBag['location'] = Location::groupBy('district')->select('district')->get();


    if (Auth::check()) {
        // Get user's cart items
        $id = Auth::user()->id;
        $viewBag['carts'] = Cart::where('user_id', '=', $id)->get();
    } else {
        // Get cart items from session for guest users
        $viewBag['carts'] = session()->get('home.show_cart', []);
    }

    return view('home.show_cart', $viewBag);
}


    public function remove_cart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->back();
    }



    public function cash_order(Request $request)
    {
        // dd($request->all());
        // Check if there are products in the request
        if ($request->has('products')) {
            $products = $request->input('products'); // Array of products

            // Loop through each product to save the order
            foreach ($products as $product) {
                $order = new Order();

                // Populate the order details
                $order->name = $request->input('name');
                $order->email = $request->input('email') ?? null;
                $order->phone = $request->input('mobile'); // Phone field is named 'mobile' in the form
                $order->address = $request->input('address');
                $order->user_id = Auth::id() ?? null; // Null for guests

                // Set product-specific details
                $order->product_title = $product['product_title'];
                $order->price = $product['price'];
                $order->quantity = $product['quantity'];
                $order->product_id = $product['product_id'];

                $productModel = Product::find($product['product_id']);
                if ($productModel) {
                    $order->product_image = $productModel->image; // Assign the image from the product model
                } else {
                    $order->product_image = 'default-image.jpg'; // Fallback in case the product is not found
                }
                // deliver charge
                $order->delivery_charge = $request->input('delivery_charge');
                $order->total_price = $request->input('total_price');

                // You can set default values for these fields or modify them as needed
                $order->payment_status = 'pending'; // Default payment status
                $order->delivery_status = 'processing'; // Default delivery status

                // Save the order
                $order->save();
            }

            $data = Cart::all();
            foreach ($data as $data){

                $data->delete();
            }

            // Clear the cart session after processing the order
            session()->flush('home.show_cart'); // This will remove the 'cart' session variable

            // Redirect back with success message after saving all orders
            return redirect()->route('home.show_order')->with('success', 'Order(s) created successfully.');
        } else {
            return redirect()->back()->with('error', 'No products found in the cart.');
        }
    }



    public function show_order()
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $userId = Auth::user()->id;
            // Fetch orders for the logged-in user
            $orders = Order::where('user_id', $userId)->get();
        } else {

            $orders=Order::where('user_id',null);
        }

        return view('home.order', compact('orders'));
    }




public function cancel_order($id)
{
    if (Auth::check()) {
        // For logged-in users
        $order = Order::find($id);
        if ($order) {
            $order->delivery_status = 'You canceled the order';
            $order->save();
        }
    } else {
        // For guest users, find and remove the order from the session
        $guestOrders = session()->get('guest_orders', []);
        if (isset($guestOrders[$id])) {
            unset($guestOrders[$id]);
            session()->put('guest_orders', $guestOrders);
        }
    }

    return redirect()->back()->with('success', 'Order canceled successfully.');
}



    public function checkout()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;

            $viewBag['carts'] = Cart::where('user_id', '=', $id)->get();

            return view('home.show_cart', $viewBag);
        } else {
            return redirect('login');
        }
    }




    public function add_comment(Request $request)
    {
        if (Auth::id()) {
            $comment = new Comment;

            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->product_id = $request->product_id;

            $comment->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function reply(Request $request)
    {

        if (Auth::id()) {
            $reply = new Reply;

            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;

            $reply->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }


    public function product_search(Request $request)
    {

        $viewBag['comment'] = Comment::latest()->get();
        $viewBag['reply'] = Reply::latest()->get();

        $search_text = $request->search;

        $viewBag['products'] = Product::where('title', 'LIKE', "%$search_text%")
            ->orWhere('category', 'LIKE', "$search_text")
            ->paginate(8);

        return view('home.userpage', $viewBag);
    }

    public function all_product()
    {
        $viewBag['products'] = Product::paginate(12);
        $viewBag['comment'] = Comment::latest()->get();
        $viewBag['reply'] = Reply::latest()->get();

        return view('home.all_product', $viewBag);
    }





    public function search_product(Request $request)
    {

        $viewBag['comment'] = Comment::latest()->get();
        $viewBag['reply'] = Reply::latest()->get();

        $search_text = $request->search;

        $viewBag['products'] = Product::where('title', 'LIKE', "%$search_text%")
            ->orWhere('category', 'LIKE', "$search_text")
            ->paginate(8);

        return view('home.all_product', $viewBag);
    }



    public function menBracelet()
    {
        // Hardcode the category to "Men's Bracelet"
        $category = "Men's Bracelet";

        // Use the correct column name based on your database schema
        $viewBag['products'] = Product::where('category', $category)->paginate(8);

        // Optionally, fetch all categories
        $viewBag['categories'] = Category::all();

        // Fetch latest comments and replies if needed
        $viewBag['comment'] = Comment::latest()->get();
        $viewBag['reply'] = Reply::latest()->get();

        // Return the view with all relevant data
        return view('home.menBracelet', $viewBag);
    }


    public function menRing()
    {
        // Hardcode the category to "Men's Ring"
        $category = "Men's Ring";

        // Fetch products for the "Men's Ring" category and paginate
        $viewBag['products'] = Product::where('category', $category)->paginate(8);

        // Optionally, fetch all categories if needed
        $viewBag['categories'] = Category::all();

        // Fetch latest comments and replies if needed
        $viewBag['comment'] = Comment::latest()->get();
        $viewBag['reply'] = Reply::latest()->get();

        // Return the view with all relevant data
        return view('home.menRing', $viewBag);
    }


    public function menLocket()
    {
        // Hardcode the category to "Men's Locket"
        $category = "Men's Locket";

        // Fetch products for the "Men's Locket" category and paginate them
        $viewBag['products'] = Product::where('category', $category)->paginate(8);

        // Optionally, fetch all categories if needed
        $viewBag['categories'] = Category::all();

        // Fetch latest comments and replies if needed
        $viewBag['comment'] = Comment::latest()->get();
        $viewBag['reply'] = Reply::latest()->get();

        // Return the view with all relevant data
        return view('home.menLocket', $viewBag);
    }

    public function menWatch()
    {
        // Hardcode the category to "Men's Watch"
        $category = "Men's Watch";

        // Fetch products for the "Men's Watch" category and paginate them
        $viewBag['products'] = Product::where('category', $category)->paginate(8);

        // Optionally, fetch all categories if needed
        $viewBag['categories'] = Category::all();

        // Fetch latest comments and replies if needed
        $viewBag['comment'] = Comment::latest()->get();
        $viewBag['reply'] = Reply::latest()->get();

        // Return the view with all relevant data
        return view('home.menWatch', $viewBag);
    }



    public function girlRing()
{
    // Hardcode the category to "Girl's Ring"
    $category = "Girl's Ring";

    // Fetch products for the "Girl's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.girlRing', $viewBag);
}


public function girlLocket()
{
    // Hardcode the category to "Girl's Locket"
    $category = "Girl's Locket";

    // Fetch products for the "Girl's Locket" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.girlLocket', $viewBag);
}


public function girlFullSet()
{
    // Hardcode the category to "Girl's Full Set"
    $category = "Girl's Full Set";

    // Fetch products for the "Girl's Full Set" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.girlFullSet', $viewBag);
}



    public function girlWatch()
{
    // Hardcode the category to "Girl's Watch"
    $category = "Girl's Watch";

    // Fetch products for the "Girl's Watch" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.girlWatch', $viewBag);
}



public function girlAnklet()
{
    // Hardcode the category to "Girl's Anklet"
    $category = "Girl's Anklet";

    // Fetch products for the "Girl's Anklet" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.girlAnklet', $viewBag);
}



public function girlEarring()
{
    // Hardcode the category to "Girl's Earring"
    $category = "Girl's Earring";

    // Fetch products for the "Girl's Earring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.girlEarring', $viewBag);
}




public function coupleRing()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Couple's Ring";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.coupleRing', $viewBag);
}


public function coupleLocket()
{
    // Hardcode the category to "Couple's Locket"
    $category = "Couple's Locket";

    // Fetch products for the "Couple's Locket" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.coupleLocket', $viewBag);
}


public function coupleBracelet()
{
    // Hardcode the category to "Couple's Bracelet"
    $category = "Couple's Bracelet";

    // Fetch products for the "Couple's Bracelet" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.coupleBracelet', $viewBag);
}


public function coupleProduct()
{
    $categories = ["Couple's Bracelet", "Couple's Locket", "Couple's Ring"];

    // Fetch products for both categories and paginate them
    $viewBag['products'] = Product::whereIn('category', $categories)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.coupleProduct', $viewBag);
}


public function mensProduct()
{
    $categories = ["Men's Bracelet", "Men's Locket", "Men's Ring","Men's Watch"];

    // Fetch products for both categories and paginate them
    $viewBag['products'] = Product::whereIn('category', $categories)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.mensProduct', $viewBag);
}




public function girlsProduct()
{
    $categories = ["Girl's Bracelet", "Girl's Locket", "Girl's Ring","Girl's Watch","Girl's Anklet","Girl's Earring"];

    // Fetch products for both categories and paginate them
    $viewBag['products'] = Product::whereIn('category', $categories)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.girlsProduct', $viewBag);
}


// public function slider()
// {
//     $viewBag['slider']= Slider::latest()->get();
//     return view('home.slider', $viewBag);
// }



public function furniture()
{
    // Assuming you have a Product model and a 'furniture' category
    $products = Product::where('category', 'furniture')->paginate(10);

    return view('home.furniture', compact('products'));
}


public function furnitureTable()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Table";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureTable', $viewBag);
}


public function furnitureBed()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Bed";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureBed', $viewBag);
}


public function furnitureAlmirah()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Almirah";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureAlmirah', $viewBag);
}


public function furnitureStool()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Stool";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureStool', $viewBag);
}


public function furnitureBookShelf()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Bool Shelf";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureBookShelf', $viewBag);
}


public function furnitureChair()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Chair";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureChair', $viewBag);
}


public function furnitureCarftDecor()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Carft & Decor";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureCarftDecor', $viewBag);
}


public function furnitureShowcase()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Showcase";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureShowcase', $viewBag);
}


public function furnitureWardrobe()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Wardrobe";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureWardrobe', $viewBag);
}


public function furnitureOvenRack()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Oven Rack";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureOvenRack', $viewBag);
}


public function furnitureRockingChair()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Rocking Chair";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureRockingChair', $viewBag);
}


public function furnitureTeaTable()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Tea Table";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureTeaTable', $viewBag);
}

public function furnitureAlna()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Alna";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureAlna', $viewBag);
}

public function furnitureDressingTable()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Dressing Table";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureDressingTable', $viewBag);
}


public function furnitureTvTrolley()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Tv Trolley";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureTvTrolley', $viewBag);
}


public function furnitureSofaSet()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Sofa Set";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureSofaSet', $viewBag);
}


public function furnitureShowRack()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Show Rack";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureShowRack', $viewBag);
}


public function furnitureDivan()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Divan";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureDivan', $viewBag);
}


public function furnitureKitchenCabinet()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Kitchen Cabinet";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureKitchenCabinet', $viewBag);
}

public function furnitureParts()
{
    // Hardcode the category to "Couple's Ring"
    $category = "Accessories & Parts";

    // Fetch products for the "Couple's Ring" category and paginate them
    $viewBag['products'] = Product::where('category', $category)->paginate(8);

    // Optionally, fetch all categories if needed
    $viewBag['categories'] = Category::all();

    // Fetch latest comments and replies if needed
    $viewBag['comment'] = Comment::latest()->get();
    $viewBag['reply'] = Reply::latest()->get();

    // Return the view with all relevant data
    return view('home.furnitureParts', $viewBag);
}



}
