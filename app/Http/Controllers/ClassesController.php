<?php

namespace App\Http\Controllers;


use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\trainer;
use App\Models\Payment;
use App\Models\classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = classes::join('trainers', 'classes.trainer_id', '=', 'trainers.id')
        ->get(['classes.*','trainers.trainer_firstname','trainers.trainer_lastname']);
        return view("trainer.classes")->with("classes",$res);
    }
    public function show_classes()
    {
        $res = classes::join('trainers', 'classes.trainer_id', '=', 'trainers.id')
        ->get(['classes.*','trainers.trainer_class','trainers.trainer_firstname','trainers.trainer_lastname']);
        return view('classes')
        ->with('breadcrumb_title', 'Classes')
        ->with("classes",$res);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("trainer.add_class")->with("trainers",trainer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'class_name'=>'required |max:50',
            'class_description'=>'required',
            'trainer_id'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:5048'
         ]);
         $new_image_name = time().'.'.$request->image->extension();
         $admin = classes::create([
             'class_name' => $request['class_name'],
             'class_description' => $request['class_description'],
             'class_duration' => '45 Minutes',
             'trainer_id' => $request['trainer_id'],
             'class_image'=>'classes_images/'.$new_image_name 
         ]);
         $request->image->move(public_path('classes_images'),$new_image_name);
         return back()->with('success', 'Class Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $res = classes::join('trainers', 'classes.trainer_id', '=', 'trainers.id')
        ->where('classes.id',$id)
        ->get(['classes.*','trainers.trainer_firstname','trainers.trainer_lastname']);
        //dd($res);
        return view("trainer.edit-classes")
        ->with("trainers",trainer::all())
        ->with("classes",$res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData;
        if (isset($request->changeTeamLeader)) {
            // checked
            $validatedData = $request->validate([
                'class_name'=>'required |max:50',
                'class_description'=>'required | max:255',
                'trainer_id'=>'required | max:25',
            ]);
        }
        else{
            $validatedData = $request->validate([
                'class_name'=>'required |max:50',
                'class_description'=>'required | max:255',
            ]);
        }   
        classes::find($id)->update($validatedData);
        return back()->with('success',"Successfully Edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Enrollment::find($id)->delete();
        return back()->with('success',"Successfully Deleted");
    }
    public function class_enrollments($id)
    {
        $classes = classes::findOrFail($id);
        $res = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')
        ->where('enrollments.class_id',$id)
        ->get(['users.*', 'enrollments.*']);

        return view("trainer.class-enrollments")
        ->with("classes",$classes)
        ->with("enrollments",$res);
    }
    public function my_classes_trainer()
    {
        $res = classes::where('trainer_id', Auth::guard('trainer')->user()->id)->get();
        return view("trainer.my-classes")->with("classes",$res);
    }
    public function my_classes_member()
    {
        $res =Enrollment::join('classes', 'enrollments.class_id', '=', 'classes.id')
        ->where('enrollments.user_id',Auth::user()->id)
        ->get(['classes.*', 'enrollments.*']);
        $payments = Payment::where('user_id', Auth::user()->id)
               ->orderBy('created_at')
               ->get();
        return view('my-profile')
        ->with("classes",$res)
        ->with("payments",$payments)
        ->with('breadcrumb_title', 'My Profile');
    }
    public function edit_member_profile(Request $request)
    {
        //Change Password
        $user = Auth::user();
        $user->member_firstname = $request->get('member_firstname');
        $user->member_lastname = $request->get('member_lastname');
        $user->member_phonenumber = $request->get('member_phonenumber');
        $user->save();
        return response()->json(array('msg' => "Sucess,Refresh to see changes"));
    }
    public function member_change_password(Request $request)
    {
            
            if ($request->isMethod('post')) {
            if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
                // The passwords matches
                return response()->json(array('msg' => "Your current password does not match with the password you provided. Please try again"));
                //return back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            }
            
            if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
                //Current password and new password are same
                return response()->json(array('msg' => "New Password cannot be same as your current password. Please choose a different password"));
                //return back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            }
    
            if(!(strcmp($request->get('newpasswordconfirm'), $request->get('newpassword')) == 0)){
                //Current password and new password are same
                return response()->json(array('msg' => "Password Mismatch"));
                //return back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            }  

            //Change Password
            $user = Auth::user();
            $user->password = Hash::make($request->get('newpassword'));
            $user->save();
            return response()->json(array('msg' => "Password changed successfully"));
            //return back()->with("success","Password changed successfully !");
        }
        else{
            return view("change-password")->with('breadcrumb_title','Change Passowrd');
        }     
    }

    public function un_enroll($id)
    {
        Enrollment::find($id)->delete();
        return back()->with('success',"Successfully Deleted,If no change,please refresh page");
    }
}
