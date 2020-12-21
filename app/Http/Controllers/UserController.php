<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    // public function uploadAvatar(Request $request) {

    //     if($request->hasFile('image')) {

    //         $filename = $request->image->getClientOriginalName();

    //         if(auth()->user()->avatar)
    //         {
    //             Storage::delete('/public/images/'.auth()->user()->avatar);
    //         }

    //       // $request->image->store('images', 'public');
    //        $request->image->storeAs('images', $filename, 'public');
    //        //$request->image->move('custom-images/', $filename);
    //        // Auth::user()->update(['avatar' => $filename]);
    //        auth()->user()->update(['avatar' => $filename]);
    //       return redirect()->back();
    //     }
    // }

    public function uploadAvatar(Request $request) {

        if($request->hasFile('image')) {
          User::uploadAvatar($request->image);
         // $request->session()->flash('message','Image uploaded successfully');
          return redirect()->back()->with('message','Image uploaded successfully'); // success
        }
       // $request->session()->flash('error','Image not uploaded');
        return redirect()->back()->with('error','Image not uploaded'); //error
    }


    public function index() {

        // DB::insert('insert into users (name, email, password) values (?, ?, ?)',
        //  ['sarthak', 'sarthak@test.com', 'password']);
      //  $users = DB::select('select * from users');
       //  DB::update('update users set name = ? where id = 1', ['John Smith']);
    //    DB::delete('delete from users where id = ?', [1]);
    //     $users = DB::select('select * from users');
    //     return $users;

        // $user  = new User();
        // $user->name = "vivek";
        // $user->email = 'vivek@test.com';
        // $user->password = bcrypt('password');
        // $user->save();

       // User::where('id', 2)->delete();
      // User::where('id', 3)->update(['name' => 'vivekgupta']);

      $data = [
          'name' => 'Sarthak',
          'email' => 'sarthak@test.com',
          'password' => 'password'
      ];

     // User::create($data);

        $user = User::all();
       // dd($user);
        return $user;


    }
}
