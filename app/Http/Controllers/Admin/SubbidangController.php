<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subbidang;
use Illuminate\Support\Facades\Gate;
use DB;
use DataTables;
use App\User;
use SweetAlert;
use File;

class SubbidangController extends Controller
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
        return view('admin.admin_pengaduan.indexSubbidang');
    }

    public function data()
    {
        $query = Subbidang::orderBy('created_at','asc');
        // dd($query);
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>
            <a href="' . route('subbidang.edit', $list->subbidang_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick="deleteData('.$list->subbidang_id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </center>
            ';
        })
        ->addIndexColumn('id')
        ->toJson();


        // <a href="' . route('subbidang.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
        //     <a onclick="deleteData('.$list->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
    }

    public function create()
    {
        return view('admin.admin_pengaduan.createSubbidang');
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required",
            "avatar" => "nullable",

        ])->validate();

        $subbidang = new Subbidang;
        $subbidang->nama_subbidang = $request->get('name');


        if ($request->hasFile('avatar')) {
            $file = $request->get('name') . '-' . 'avatar.' . $request->avatar->getClientOriginalExtension();
            $filename = $request->file('avatar');
            $filename->move('images/anjungan', $file);

            $subbidang->avatar = $file;
        }

        $subbidang->save();
        session()->flash('success', 'Data Berhasil Disimpan.');
        return redirect()->route('subbidang.index');
    }


    public function edit($id)
    {
        $subbidang = Subbidang::findOrFail($id);
        return view('admin.admin_pengaduan.editSubbidang', [
            'subbidang' => $subbidang
        ]);
    }


    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required",
            "avatar" => "nullable",

        ])->validate();

        $subbidang = Subbidang::findOrFail($id);
        $subbidang->nama_subbidang = $request->get('name');

        if ($request->hasFile('avatar')) {
            $file = $request->get('name') . '-' . 'avatar.' . $request->avatar->getClientOriginalExtension();
            $filename = $request->file('avatar');
            $filename->move('images/anjungan', $file);

            $subbidang->avatar = $file;
        }

        $subbidang->save();
        session()->flash('success', 'Data Berhasil Diupdate.');
        return redirect()->route('subbidang.index');
    }


    public function destroy($id)
    {
        $gambar = Subbidang::findOrFail($id);
        File::delete('images/anjungan/'.$gambar->avatar);

        Subbidang::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->route('subbidang.index');
    }
}



