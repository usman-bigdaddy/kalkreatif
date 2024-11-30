<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        return view("trainer.members")->with("members",User::all());
    }
    public function create()
    {
        return view("trainer.add_member");
    }
   
}
