<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Store;
//use App\Models\Product;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use RealRashid\SweetAlert\Facades\Alert;
use PHPUnit\Exception;
Use Alert;


use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class UserController extends Controller
{
    /**
    @return \Illuminate\Http\Response

    */
    // public function index()
    // {
    //     $denno = Store::query()->get();
    //     return view('users.index',[
    //         "denno"=>$denno
    //     ]);
    // }

    /**
     * Main welcome page
     */
    public function welcome()
    {
    //    alert('Success Title', 'Success Message','info')->persistent();
       //this is how I would write it down... nisha andika.. but want to copy it kwa notepad..tukimaliza
       alert()->success('Success Title',"Success Message")->persistent();
       //i think i am in love na hii...i have understood this well Oka...y
        return view('welcome');
    }


    public function index()
    {
        $denno = store::all();
        //$denno = Store::query()->get();
         return view('users.index', compact('denno'));
    }
    public function store(Request $request)
    {
        $detail = new store;

        $detail->name=$request->name;
        $detail->email=$request->email;
        $detail->phone=$request->phone;
        $detail->password=$request->password;
        $detail->confirm_password=$request->confirm_password;
        $detail->role=$request->role;
        $detail->save();
        $message='user added successfully';
        alert()->success('success',$message)->persistent();
        return redirect()->back()->with('User Created Sucessfully');
        //return redirect()->back()->with('user creation failed');
        //$users=Store::create($request->all());
    }

    // public function index()
    // {
    //     //$deal=user::all();
    //     $denno = User::query()->get();
    //     return view('users.index',[
    //         "denno"=>$denno
    //     ]);
    // }


    // public function user(Request $request)
    // {
    //     $detail = new user;

    //     $detail->name=$request->name;
    //     $detail->email=$request->email;
    //     $detail->phone=$request->phone;
    //     $detail->password=$request->password;
    //     $detail->confirm_password=$request->confirm_password;
    //     $detail->role=$request->role;
    //     $detail->save();
    //     return redirect()->back()->with('User Created Sucessfully');
    //     //return redirect()->back()->with('user creation failed');
    // }

    // public function update(Request $request)
    // {

    //     $detail = store::orderBy('id','desc')->paginate(5);
    //     $request->validate([
    //         'name'=>'required',
    //         'email'=>'required',
    //         'phone'=>'required',
    //         'password'=>'required',
    //         'confirm_password'=>'required',
    //         'role'=>'required',
    //     ]);
    //     $detail->fill($request->post())->save();
    //     return redirect()->back()->with('sucess','user record updated successfully');

    //     //$detail = DB::delete('delete from users');
    //     // $detail = Store::find($id);
    //     // if(!$detail){
    //     //     return back()->with('Error', 'user not found');
    //     //     return back()->with('success', 'user updated successfully');
    //     // }
    //     // $detail =update(request->all());
    // }
    public function update(Request $request)
    {
        $users = Store::find($request->id);
        if(!$users){
            $message='user update failed';
            alert()->info('NOTE', $message);
            return back()->with('Error', $message);
        }
        $users ->update($request->all());

        $message = 'user updated successfully';
        alert()->success('Success',$message)->persistent();
        //FacadesAlert::alert('success', $message)->persistent();//so wako wrong kwa iyo do
        return back()->with('success', $message);
    }

    /**
     * Function to delete a  user
      */
    public function destroy(Request $request)
    {
        $users = Store::find($request->id);
        if(!$users){
            //return back()->with('Error', 'User not found');
            return $users;
        }
        $users ->delete();
        $message='user deleted successfully';
        alert()->success('success', $message)->persistent();
        return back()->with('success', $message);
    }

    // public function products(Request $request)
    // {
    //     //return view('products.index');

    //     $prod = new product;

    //     $prod->name=$request->name;
    //     $prod->email=$request->description;
    //     $prod->phone=$request->sellingprice;
    //     $prod->password=$request->quantity;
    //     $prod->save();

    //     $message='product uploaded successfully';

    //     alert()->success('success', $message)->persistent();
    //     return redirect()->back()->with($message);
    // }

//again,
}
