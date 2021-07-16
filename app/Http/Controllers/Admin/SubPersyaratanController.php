<?php

namespace App\Http\Controllers\Admin;

use App\DasarLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\Persyaratan;
use App\Subbidang;
use App\SubPersyaratan;
use Illuminate\Support\Facades\Gate;
use DB;
use DataTables;
use App\User;
use SweetAlert;
use File;
use Illuminate\Support\Facades\DB as IlluminateDB;

class SubPersyaratanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        // OTORISASI GATE
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-users')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index($id)
    {

        $cek = Persyaratan::where('persyaratan_id',$id)->first();

        // $DasarLayanan = DB::table('dasar_layanan')
        //                 ->leftJoin('dasar_hukum','dasar_layanan.dasarhukum_id','=','dasar_hukum.dasarhukum_id')

        //                 ->where('layanan_id', $id)
        //                 ->select('nama_peraturan', 'tentang')
        //                 ->get();

        return view('admin.admin_pengaduan.indexSubPersyaratan',[
            'persyaratan' => $cek,
        ]);
    }

    public function data(Request $request)
    {
        $id_persyaratan = $request->input('id');

        $query = DB::table('subpersyaratan')


                        ->where('persyaratan_id', $id_persyaratan)

                        ->get();
        // dd($query);
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>

            <a href="' . route('subpersyaratan.edit', $list->subpersyaratan_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick= "deleteData('.$list->subpersyaratan_id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </center>
            ';
        })
        ->addIndexColumn('id')
        ->toJson();


        // <a href="' . route('subbidang.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
        //     <a onclick
    }

    public function create($id)
    {
        $persyaratan = Persyaratan::where('persyaratan_id',$id)->first();
        // dd($layanan);
        return view('admin.admin_pengaduan.createSubPersyaratan',[
            'persyaratan' => $persyaratan,
        ]);
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "subpersyaratan" => "required",


        ])->validate();

        $persyaratan = new SubPersyaratan;
        $persyaratan->uraian_subpersyaratan = $request->get('subpersyaratan');
        $persyaratan->persyaratan_id = $request->get('persyaratan_id');

        $persyaratan_id = $request->get('persyaratan_id');
        $persyaratan->save();
        session()->flash('success', 'Data Berhasil Disimpan.');
        return redirect()->route('subpersyaratan.index', $persyaratan_id);
    }

    public function edit($id)
    {
        $subpersyaratan = SubPersyaratan::findOrFail($id);

        // dd($layanan);
        return view('admin.admin_pengaduan.editSubPersyaratan',[
            'subpersyaratan' => $subpersyaratan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(),[
            "subpersyaratan" => "required",


        ])->validate();

        $subpersyaratan= SubPersyaratan::findOrFail($id);
        $subpersyaratan->uraian_subpersyaratan = $request->get('subpersyaratan');

        $persyaratan = $subpersyaratan->persyaratan_id;

        $subpersyaratan->save();
        session()->flash('success', 'Data Berhasil Diupdate.');
        return redirect()->route('subpersyaratan.index', $persyaratan);
    }

    public function destroy($id)
    {
        // dd($id);
        SubPersyaratan::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->back();
    }
}
