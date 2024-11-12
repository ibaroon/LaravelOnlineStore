<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class UsesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route']='users'; // for making sidebar class active
        $data['users']=User::all();
        //return $data['cats']; //view result
        return  view('admin.Users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return"edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
      //return $user;
       // Storage::disk('public/avatars')->delete($user->image);
        $user->delete();
        toastr()->success(trans("feedback_messages.success_delete"));
           return redirect()->route('users.index');
    }

    public function change_type(User $user)
    {  $old_type =$user->is_admin; // old img
        if( $old_type==1)  {$new_type=0;} else{$new_type=1;}
         try{

    
             $user->update(['is_admin'=>$new_type ,]);
             toastr()->success(trans("feedback_messages.success_update"));
             return redirect()->back();

         }catch(\Exception $e){
             return redirect()->back()->withErrors('error',$e->getMessage());
       }


    }
}
