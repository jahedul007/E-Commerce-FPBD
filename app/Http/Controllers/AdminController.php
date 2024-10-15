<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Slider;
use App\Models\Product;
use App\Models\category;
use App\Models\Location;
use App\Models\ReviewImage;
use App\Models\ProductImage;
use App\Models\ReviewSlider;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\productAnotherImage;
use App\Http\Controllers\Controller;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;
// use Illuminate\Notifications\Notification;
// use send;


class AdminController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new category;
        $data->category_name = $request->name;

        $data->save();

        return redirect()->back()->with('success', 'Category Added Successfully');
    }

    public function destroy($id)
    {
        $data = category::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->with('fail', 'Category Delete Successfully');
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        // dd($request->all());
        $product = new Product;

        $product->title = $request->title;
        $product->code = $request->code;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->credentials = $request->credentials;
        $product->youtube = $request->youtube;
        $product->reviewCredentials = $request->reviewCredentials;

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('product'), $imageName);

        $product->image =  $imageName;

        $imageName = time() . '.' . $request->detailsImage->extension();
        $request->detailsImage->move(public_path('image'), $imageName);

        $product->detailsImage =  $imageName;

        $imageName = time() . '.' . $request->reviewImage->extension();
        $request->reviewImage->move(public_path('image'), $imageName);

        $product->reviewImage =  $imageName;

        $product->save();

        return redirect()->back()->with('success', 'Successfully add your Product');
    }




    public function multiImage($id)
    {
        // Retrieve the product by ID
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('admin.multiImage', compact('product'));
    }


    public function saveMultipleImage(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image.*' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $productId = $request->product_id;

        foreach ($request->file('image') as $file) {
            $imageName = time() . '-' . uniqid() . '.' . $file->extension();
            $file->move(public_path('product_images'), $imageName);

            // Save each image to product_images table with correct product_id
            ProductImage::create([
                'product_id' => $productId,
                'image' => $imageName,
            ]);
        }

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }












    public function anotherMultiImage($id)
    {
        // Retrieve the product by ID
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('admin.anotherMultiImage', compact('product'));
    }


    public function saveAnotherMultipleImage(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'detailsImage.*' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $productId = $request->product_id;

        foreach ($request->file('detailsImage') as $file) {
            $imageName = time() . '-' . uniqid() . '.' . $file->extension();
            $file->move(public_path('product_another_image'), $imageName);

            // Save each image to product_images table with correct product_id
            productAnotherImage::create([
                'product_id' => $productId,
                'detailsImage' => $imageName,
            ]);
        }

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }







    public function reviewMultiImage($id)
    {
        // Retrieve the product by ID
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('admin.reviewMultiImage', compact('product'));
    }

    public function saveReviewMultipleImage(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'reviewImage.*' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $productId = $request->product_id;

        // Ensure that files are uploaded before looping
        if ($request->hasFile('reviewImage')) {
            foreach ($request->file('reviewImage') as $file) {
                $imageName = time() . '-' . uniqid() . '.' . $file->extension();
                $file->move(public_path('product_review_images'), $imageName);

                // Save each image to review_images table with correct product_id
                ReviewImage::create([
                    'product_id' => $productId,
                    'reviewImage' => $imageName,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }




    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }

    public function edit_product($id)
    {
        $viewBag['product'] = Product::where('id', $id)->first();
        $viewBag['categories'] = category::all();
        return view('admin.edit_product', $viewBag);
    }


    public function update_product(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);
        $product = Product::where('id', $id)->first();

        if (isset($request->image)) {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('product'), $imageName);

            $product->image =  $imageName;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $product->youtube = $request->youtube;



        $product->save();

        return redirect(route('admin.showProduct'))->with('success', 'Product Successfully Update!!!');
    }


    public function delete_product($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect()->back()->with('fail', 'Product Successfully Delete!!!');
    }

    public function order()
    {
        $viewBag['orders'] = Order::latest()->get();
        return view('admin.order', $viewBag);
    }

    public function ontheway($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "on_the_way";

        $order->save();

        return redirect()->back();
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "Delivered";
        $order->payment_status = "Paid";

        $order->save();

        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $viewBag['order'] = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', $viewBag);
        return $pdf->download('invoice.pdf');
    }


    public function email_info($id)
    {
        $viewBag['order'] = Order::find($id);
        return view('admin.emailInfo', $viewBag);
    }

    // public function send_user_email(Request $request, $id)
    // {
    //     $order=Order::find($id);

    //     $details = [
    //         'greeting' => $request->greeting,
    //         'firstline' => $request->firstline,
    //         'body' => $request->body,
    //         'button' => $request->button,
    //         'url' => $request->url,
    //         'lastline' => $request->lastline,
    //     ];

    //     Notification::send($order, new SendEmailNotification($details));

    //     return redirect()->back();


    //     // return view('admin.sendUserEmail',$viewBag);
    // }

    public function send_user_email(Request $request, $id)
    {
        // Find the order or fail if not found
        $order = Order::with('user')->findOrFail($id);

        // Fetch the associated user
        $user = $order->user; // Ensure that the Order model has a 'user' relationship

        // Check if the user exists
        if (!$user) {
            return redirect()->back()->with('fail', 'User not found.');
        }

        // Prepare the notification details
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        // Send the notification
        Notification::send($user, new SendEmailNotification($details));

        return redirect()->back()->with('success', 'Email sent successfully');
    }


    public function search(Request $request)
    {
        $searchText = $request->search;

        $orders = Order::where('name', 'LIKE', "%$searchText%")
            ->orWhere('email', 'LIKE', "%$searchText%")
            ->orWhere('phone', 'LIKE', "%$searchText%")
            ->orWhere('product_title', 'LIKE', "%$searchText%")
            ->get();

        return view('admin.order', compact('orders'));
    }



    // Slider part start


    public function slider()
    {
        $slider = Slider::get();
        return view('admin.slider', compact('slider'));
    }


    public function addSlider()
    {
        return view('admin.addSlider');
    }

    public function storeSlider(Request $request)
    {
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->name = $request->name;

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('product'), $imageName);

        $slider->image =  $imageName;

        $slider->save();

        return redirect()->back()->with('success', 'Product Successfully Added!!!');
    }

    public function destroySlider(Slider $slider, $id)
    {
        $slider = Slider::where('id', $id)->first();
        $slider->delete();
        return redirect()->back();
    }

    // slider part end


    // Review Slider part start


    public function reviewSlider()
    {
        $reviewSlider = ReviewSlider::get();
        return view('admin.reviewSlider', compact('reviewSlider'));
    }


    public function addReviewSlider()
    {
        return view('admin.addReviewSlider');
    }

    public function storeReviewSlider(Request $request)
    {
        $reviewSlider = new ReviewSlider;
        $reviewSlider->title = $request->title;
        $reviewSlider->name = $request->name;

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('product'), $imageName);

        $reviewSlider->image =  $imageName;

        $reviewSlider->save();

        return redirect()->back()->with('success', 'Product Successfully Added!!!');
    }

    public function destroyReviewSlider(ReviewSlider $reviewSlider, $id)
    {
        $reviewSlider = ReviewSlider::where('id', $id)->first();
        $reviewSlider->delete();
        return redirect()->back();
    }



    //Review Slider part end








    public function location()
    {
        $viewBag['location'] = Location::get();
        return view('admin.location', $viewBag);
    }


    public function storeLocation(Request $request)
    {
        $district = $request->input('district');
        $thanas = $request->input('thana'); // This will be an array of Thanas

        foreach ($thanas as $thana) {
            Location::create([
                'district' => $request->input('district'),
                'thana' => $thana // Loop through thana array if needed
            ]);
        }

        return redirect()->back()->with('success', 'Location saved successfully!');
    }







    public function deleteLocation(Request $request, $id)
    {
        $location = Location::where('id', $id)->first();

        $location->delete();

        return redirect()->back()->with('fail', 'Successfully Delete!!! Never Repeat');
    }


    // Controller Method to get Thanas based on District
    public function getThanas(Request $request)
    {
        $district = $request->district; // Get the district from the AJAX request
        $thanas = Location::where('district', $district)->pluck('thana'); // Fetch thanas for the district

        return response()->json($thanas); // Return the list of thanas as JSON
    }
}
