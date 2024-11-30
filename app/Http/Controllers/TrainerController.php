<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\trainer;
use App\Models\User;
use App\Models\classes;
use App\Models\feedback;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /*
    |--------------------------------------------------------------------------

    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/trainer/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth:trainer');
    }

    public function index()
    {
        return view("trainer.trainers")->with("trainers",trainer::all());
        //return view("trainer.trainers")->with("trainers",trainer::limit(2)->get());
    }
    public function create()
    {
        return view("trainer.add_trainer");
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=>'required |max:50',
            'trainer_firstname'=>'required | max:25',
            'trainer_lastname'=>'required | max:25',
            'trainer_phonenumber'=>'required | max:11|min:11',
            'trainer_address'=>'required | max:265',
            'trainer_gender'=>'required | max:8',
            'trainer_class'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:5048'
         ]);
        $new_image_name = $request->email.'.'.$request->image->extension();
        $admin = trainer::create([
            'email' => $request['email'],
            'trainer_firstname' => $request['trainer_firstname'],
            'trainer_lastname' => $request['trainer_lastname'],
            'password' => Hash::make("1234"),
            'trainer_phonenumber' => $request['trainer_phonenumber'],
            'trainer_address' => $request['trainer_address'],
            'trainer_gender' => $request['trainer_gender'],
            'trainer_class' => $request['trainer_class'],
            'image'=>'trainer_images/'.$new_image_name 
        ]);
        $request->image->move(public_path('trainer_images'),$new_image_name);
        return back()->with('success', 'Trainer Added.');
    }
    public function trainer_login(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email'   => 'required|email',
                'password' => 'required|max:6'
            ]);
            if(Auth::guard('trainer')->attempt($request->only('email','password'),$request->remember)){
                return redirect()->intended('/dashboard/trainer/');
            }
            return back()->withInput($request->only('email', 'remember'));
        }
        else{
            return view('trainer.login');
        }
    }
    public function dash()
    {
        if (!(Auth::guard('trainer')->check())) {
            return redirect()->route('admin.login');
        }
        return view('trainer.dashboard')
        ->with("trainer_count",trainer::count())
        ->with("users",User::limit(5)->get())
        ->with("class_count",classes::count())
        ->with("member_count",User::count());
    }
    public function trainers_gender_count()
    {
        $Male = trainer::where('trainer_gender','=','Male')->count();
        $Female = trainer::where('trainer_gender','=','Female')->count();
        return response()->json(array('Male' => $Male, 'Female' => $Female));
    }
    public function members_gender_count()
    {
        $Male = User::where('member_gender','=','Male')->count();
        $Female = User::where('member_gender','=','Female')->count();
        return response()->json(array('Male' => $Male, 'Female' => $Female));
    }
    public function trainer_change_password(Request $request)
    {
        //
        if ($request->isMethod('post')) {
            if (!(Hash::check($request->get('current-password'), Auth::guard('trainer')->user()->password))) {
                // The passwords matches
                return back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            }
            
            if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                //Current password and new password are same
                return back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            }
    
            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:4|confirmed',
            ]);    

            //Change Password
            $user = Auth::guard('trainer')->user();
            $user->password = Hash::make($request->get('new-password'));
            $user->save();
            return back()->with("success","Password changed successfully !");
        }
        else{
            return view('trainer.change-password');
        }
    }
    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect('/home')->with('success',"Successfully Deleted");
    }
    public function feedback()
    {
        return view('trainer.feedback')->with('feedbacks',feedback::all());
    }
    public function delete_feedback($id)
    {
        feedback::find($id)->delete();
        return back()->with('success',"Successfully Deleted");
    }
    
    
}
