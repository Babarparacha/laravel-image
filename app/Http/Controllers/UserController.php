<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // here we feth all the record from  db 
        $users=User::get();
        // $users->toArray();
        // return $users;
      return view('file-uplaod',compact('users'));
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
        $request->validate([   
            'photo'=>'required|mimes:png,jpg,jpeg|max:5000'
        ]);
        $file=$request->file('photo');
        //    1st method to store image with random name
    $path=$request->photo->store('image','public');
// call model here 
User::create([
    'file_name'=>$path,
]);

    //    2nd method to store image with original name;
    // $fileName=$file->getClientOriginalName();
    //  $path=$request->photo->storeAs('image',$fileName,'public');
    //   return $path;
    return redirect()->route('user.index')->with('status','user Image Uploaded');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        return view('file-update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
   $user=user::find($id);
   if($request->hasFile('photo')){
    $path=$request->photo->store('images','public');
    $user->file_name=$path;
    $user->save(); 
    return redirect()->route('user.index')->with('status','user Image updated');

   }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $user=USER::find($id);
    $user->delete();
    $image_path=public_path("storage/").$user->file_name;
    // return $image_path;
    if(file_exists($image_path)){
        unlink($image_path);
    }
    return redirect()->route('user.index')->with('status','user Image deleted');

}
}