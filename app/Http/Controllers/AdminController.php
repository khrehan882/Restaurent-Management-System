<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Reservation;
use App\Models\Orders;

class AdminController extends Controller
{
    public function user()
    {
     $data=user::all();
        return view("admin.users", compact("data"));
    }

    public function deleteuser($id)
    {
     $data=user::find($id);
     $data->delete();
     return redirect()->back();
    }

    public function deletemenu($id)
{
    $data = food::find($id);

    if (!$data) {
        return redirect()->back()->with('error', 'Food not found.');
    }

    // Get the image filename from the data
    $imageFileName = $data->image;

    // Delete the image from the /foodimage folder
    $imagePath = public_path('foodimage/' . $imageFileName);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete the menu item from the database
    $data->delete();

    return redirect()->back()->with('success', 'Food deleted successfully.');
}

    public function foodmenu()
    {
        $data = food::all();
        return view("admin.fodmenu", compact('data'));
    }

    public function updateview($id)
    {
        $data = food::find($id);
        return view("admin.updateview", compact("data"));
    }

    public function update(Request $request, $id)
{
    $data = food::find($id);
    if (!$data) {
        return redirect()->back()->with('error', 'Food not found.');
    }

    // Update the non-image fields
    $data->title = $request->input('title');
    $data->price = $request->input('price');
    $data->description = $request->input('description');

    // Delete the previous image
    if ($request->hasFile('image')) {
        $oldImagePath = public_path('foodimage/' . $data->image); // Get the path to the old image
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath); // Delete the old image
        }

        // Save the new image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('foodimage', $imageName);
        $data->image = $imageName;
    }

    $data->save();

    return redirect()->back()->with('success', 'Food updated successfully.');
}

    public function upload(Request $request)
    {
        $data = Food::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('foodimage', $imagename);
            $data->image = $imagename;
            $data->save();
        }

        return redirect()->back();
    }

    public function reservation(Request $request)
    {
             $data = new reservation;
             $data->name=$request->name;
             $data->email=$request->email;
             $data->phone=$request->phone;
             $data->guest=$request->guest;
             $data->date=$request->date;
             $data->time=$request->time;
             $data->message=$request->message;

        $data->save();
        return redirect()->back();
    }

    public function viewreservation()
    {
        if(Auth::id())
        {
        $data = Reservation::all();
        return view("admin.adminreservation", compact("data"));
        }
        else
        return redirect('login');
    }

    public function deleteReservation($id)
    {
        // Find the reservation record
        $reservation = Reservation::find($id);

        if ($reservation) {
            // Delete the reservation record from the database
            $reservation->delete();
        }

        // Redirect back to the page after deletion
        return redirect()->back();
    }



    public function viewchef()
    {
        $data=foodchef::all();
        return view("admin.adminchef", compact("data"));
    }

    public function uploadchef(Request $request)
    {

        $data= new foodchef;
        $image= $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('chefimage', $imagename);
        $data->image = $imagename;
        $data->name=$request->name;
        $data->speciality=$request->speciality;

            $data->save();
            return redirect()->back();
    }

    public function updatechef($id)
{
    $data = foodchef::find($id);
    return view("admin.updatechef", compact("data"));
}

public function updatefoodchef(Request $request, $id)
{
    $data = foodchef::find($id);

    $image = $request->file('new_image'); // Access the new image using 'new_image' field name

    if ($image) {
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('chefimage', $imagename);
        $data->image = $imagename;
    }

    $data->name = $request->name;
    $data->speciality = $request->speciality;
    $data->save();

    return redirect()->back();
}

public function deletechef($id)
{
    $data = foodchef::find($id);
    $data->delete();
    return redirect()->back();
}

public function orders()
{
    $data=orders::all();
   return view('admin.orders', compact('data'));
}

public function deleteorders($id)
{
    $data=orders::find($id);
    $data->delete();
    return redirect()->back();
}

public function search(Request $request)
{
    $search = $request->search;
    $data = orders::where('name', 'LIKE', '%' . $search . '%')
                 ->orWhere('foodname', 'LIKE', '%' . $search . '%')
                 ->get();

    return view('admin.orders', compact('data'));
}

}
