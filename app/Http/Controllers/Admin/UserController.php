<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use DB;
use DataTables;
use App\User;
use SweetAlert;
use File;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        // OTORISASI GATE
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-users')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index(Request $request)
    {
        return view('admin.admin_pengaduan.indexUser');
    }

    public function data()
    {
        $query = User::where('status','ACTIVE');
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>
            <a href="' . route('users.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick="deleteData('.$list->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </center>
            ';
        })
        ->addIndexColumn('id')
        ->toJson();
    }

    public function create()
    {
        return view('admin.admin_pengaduan.createUser');
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "username" => "required|min:5|max:20|unique:users",
            "roles" => "required",
            "phone" => "nullable|digits_between:10,12",
            "address" => "required|max:200",
            "avatar" => "nullable",
            "email" => "nullable|email|unique:users",
            "password" => "required",
            "password_confirmation" => "required|same:password",
            "roles" => "required"
        ])->validate();

        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->username = $request->get('username');
        $new_user->roles = json_encode($request->get('roles'));
        $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));

        if ($request->hasFile('avatar')) {
            $file = $request->username . '-' . 'avatar.' . $request->avatar->getClientOriginalExtension();
            $filename = $request->file('avatar');
            $filename->move('images/user', $file);

            $new_user->avatar = $file;
        }

        $new_user->save();
        session()->flash('success', 'Data Berhasil Disimpan.');
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.admin_pengaduan.editUser', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            "name" => "required|min:5|max:100",
            "username" => "required|min:5|max:20",
            "roles" => "required",
            "phone" => "nullable|digits_between:10,12",
            "address" => "required|max:200",
            "email" => "nullable|email",
            "password" => "nullable",
            "password_confirmation" => "nullable|same:password",
            "roles" => "required"
        ])->validate();

        $user = \App\User::findOrFail($id);
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->roles = json_encode($request->get('roles'));
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');

        if($request->get('password')){
            $user->password = \Hash::make($request->get('password'));
        }


        if ($request->hasFile('avatar')) {
            $file = $request->username . '-' . 'avatar.' . $request->avatar->getClientOriginalExtension();
            $filename = $request->file('avatar');
            $filename->move('images/user', $file);

            $user->avatar = $file;
        }

        $user->save();
        session()->flash('success', 'Data Berhasil Diupdate.');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $gambar = User::where('id',$id)->first();
        File::delete('images/user/'.$gambar->avatar);

        User::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->route('users.index');
    }

}
