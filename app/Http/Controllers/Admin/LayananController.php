<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\Subbidang;
use Illuminate\Support\Facades\Gate;
use DB;
use DataTables;
use App\User;
use SweetAlert;
use File;

class LayananController extends Controller
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
        return view('admin.admin_pengaduan.indexLayanan');
    }

    public function data()
    {
        $query = Layanan::orderBy('created_at','asc');
        // dd($query);
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>
            <a href=""  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </center>
            ';
        })
        ->addIndexColumn('id')
        ->toJson();


        // <a href="' . route('subbidang.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
        //     <a onclick="deleteData('.$list->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
    }
}
