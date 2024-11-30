<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trainer;
use App\Models\User;
use App\Models\classes;
use App\Models\Enrollment;
use App\Models\feedback;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome')
            ->with("trainers", trainer::where('is_admin', '!=', 1)->limit(3)->get())
            ->with("classes", classes::limit(3)->get());
    }
    public function gallery()
    {
        return view('gallery')
            ->with('breadcrumb_title', 'Gallery');
    }

    public function trainer_profile($id)
    {
        $trainer_classes = classes::where('trainer_id', $id)->get();
        return view('trainerprofile')
            ->with('breadcrumb_title', 'Trainer')
            ->with("classes", $trainer_classes)
            ->with("trainer", trainer::findOrFail($id));
    }
    public function user_login(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email'   => 'required|email',
                'password' => 'required|max:10'
            ]);
            // if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) 
            //{
            //      The user is active, not suspended, and exists.
            // }
            if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
                return redirect()->intended('/');
            } else {
                return back()->with('server-error', 'Please Try Again.');
            }
        } else {
        }
    }
    public function user_register(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email |max:50|unique:users',
                'member_firstname' => 'required | max:25',
                'member_lastname' => 'required | max:25',
                'member_phonenumber' => 'required | max:11',
                'member_gender' => 'required | max:8',
                'password' => 'required | min:1'
            ]);
            $user = User::create([
                'email' => $request['email'],
                'member_firstname' => $request['member_firstname'],
                'member_lastname' => $request['member_lastname'],
                'member_phonenumber' => $request['member_phonenumber'],
                'member_address' => '',
                'member_gender' => $request['member_gender'],
                'password' => Hash::make($request['password']),
            ]);

            return back()->with('success', 'Registration Successful.');
        } else {

            return view('auth.register')->with('breadcrumb_title', 'Member');
        }
    }
    public function contact(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|max:50',
                'email' => 'required | email|max:25',
                'subject' => 'required | max:25',
                'message' => 'required'
            ]);
            feedback::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'subject' => $request['subject'],
                'message' => $request['message']
            ]);
            return back()->with('success', 'Feedback Successful.');
        } else {
            return view('contact')->with('breadcrumb_title', 'Contact');
        }
    }
    public function enroll($id)
    {
        // if (!(Auth::check())) {
        //    return redirect('/user-register');
        // }
        $count = Enrollment::where('user_id', '=', auth()->user()->id)
            ->where('class_id', '=', $id)
            ->count();
        if ($count != 0) {
            return back()->with('error', 'You have already enrolled in this class.');
        } else {
            $data = ([
                'class_id' => $id,
                'enrollment_date' => date("d-m-Y"),
                'enrollment_time' => date("h:iA")
            ]);
            auth()->user()->enrollment()->create($data);
            return back()->with('success', 'You have been enrolled Successfully.');
        }
    }
    public function show_instructors()
    {
        return view('trainers')
            ->with('breadcrumb_title', 'Trainers')
            ->with("trainers", trainer::where('is_admin', '!=', 1)->get());
    }
    public function about_us()
    {
        return view('about')
            ->with("trainer_count", trainer::count())
            ->with("classes_count", classes::count())
            ->with("member_count", User::count())
            ->with('breadcrumb_title', 'About');
    }
    public function show_classes()
    {
        return view('classes')
            ->with('breadcrumb_title', 'Classes')
            ->with("trainers", trainer::all());
    }
}
