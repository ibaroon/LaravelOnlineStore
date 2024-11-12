<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
 

class ProfileController extends Controller

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

        return view('profile');

    }

    

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function store(Request $request)

    {

        $request->validate([

            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'confirm_password' => 'required_with:password|same:password',

            'image' => 'image',

        ]);

  

        $input = $request->all();

          

        if ($request->hasFile('image')) {

            $avatarName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('avatars'), $avatarName);

  

            $input['image'] = $avatarName;

        

        } else {

            unset($input['image']);

        }

  

        if ($request->filled('password')) {

            $input['password'] = Hash::make($input['password']);

        } else {

            unset($input['password']);

        }

  

        auth()->user()->update($input);

    

        return back()->with('success', 'Profile updated successfully.');

    }

}