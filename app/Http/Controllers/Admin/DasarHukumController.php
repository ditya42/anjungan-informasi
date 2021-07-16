<?php

namespace App\Http\Controllers\Admin;

use App\DasarHukum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use DB;
use DataTables;
use App\User;
use SweetAlert;
use File;

class DasarHukumController extends Controller
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
        return view('admin.admin_pengaduan.indexDasarHukum');
    }

    public function data()
    {
        $query = DasarHukum::orderBy('created_at','asc');
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>
            <a href="' . route('dasarhukum.edit', $list->dasarhukum_id) . '"   class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick="deleteData('.$list->dasarhukum_id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </center>
            ';
        })
        ->addIndexColumn('id')
        ->toJson();

    //     <a href="' . route('users.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
    //         <a onclick="deleteData('.$list->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
    }

    public function create()
    {
        return view('admin.admin_pengaduan.createDasarHukum');
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required",
            "tentang" => "required",

        ])->validate();

        $nama =  $request->get('name');
        $check = DasarHukum::where('nama_peraturan', $nama )->first();
        // dd($check);



        $dasar = new DasarHukum;
        $dasar->nama_peraturan = $request->get('name');
        $dasar->tentang = $request->get('tentang');

        if($check != NULL) {
            session()->flash('error', 'Data Sudah Ada.');
            return redirect()->back();
        } else {


            $dasar->save();
            session()->flash('success', 'Data Berhasil Disimpan.');
            return redirect()->route('dasarhukum.index');
        }

    }

    public function edit($id)
    {
        $dasar = DasarHukum::findOrFail($id);
        return view('admin.admin_pengaduan.editDasarHukum', [
            'dasar' => $dasar
        ]);
    }


    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required",
            "tentang" => "required",

        ])->validate();

        $nama =  $request->get('name');
        $check = DasarHukum::where('nama_peraturan', $nama )
                ->where('dasarhukum_id', '!=' , $id)
                ->first();

        // dd($check);

        $dasar = DasarHukum::findOrFail($id);
        $dasar->nama_peraturan = $request->get('name');
        $dasar->tentang = $request->get('tentang');


        if($check != NULL) {
            session()->flash('error', 'Data Sudah Ada.');
            return redirect()->back();
        } else {


            $dasar->save();
            session()->flash('success', 'Data Berhasil Disimpan.');
            return redirect()->route('dasarhukum.index');
        }

    }

    public function destroy($id)
    {

        // dd($id);
        DasarHukum::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->route('dasarhukum.index');
    }
}
