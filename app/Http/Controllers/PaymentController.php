<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index($id)
    {
        session(['user_id' => $id]);
        return view('trainer.payment')
        ->with("member",User::findOrFail($id))
        ->with("payment",Payment::all());
    }
    public function store(Request $request)
    {
        $user_id = "";
        if (Auth::check()) {
            $user_id = auth()->user()->id;
        }
        else{
            $user_id =  session('user_id');
        }
        $this->validate($request, [
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:5048'
         ]);
        $new_image_name = time().'_'.$user_id.'.'.$request->image->extension();
        $admin = Payment::create([
            'image'=>'payment_images/'.$new_image_name,
            'user_id'=>$user_id
        ]);
        $request->image->move(public_path('payment_images'),$new_image_name);
        return back()->with('success', 'Image Added.');
    }
}
