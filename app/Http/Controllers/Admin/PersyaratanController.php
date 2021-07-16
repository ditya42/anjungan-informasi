<?php

namespace App\Http\Controllers\Admin;

use App\DasarLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\Persyaratan;
use App\Subbidang;
use Illuminate\Support\Facades\Gate;
use DB;
use DataTables;
use App\User;
use SweetAlert;
use File;
use Illuminate\Support\Facades\DB as IlluminateDB;

class PersyaratanController extends Controller
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

        $cek = Layanan::where('layanan_id',$id)->first();

        // $DasarLayanan = DB::table('dasar_layanan')
        //                 ->leftJoin('dasar_hukum','dasar_layanan.dasarhukum_id','=','dasar_hukum.dasarhukum_id')

        //                 ->where('layanan_id', $id)
        //                 ->select('nama_peraturan', 'tentang')
        //                 ->get();

        return view('admin.admin_pengaduan.indexPersyaratan',[
            'layanan' => $cek,
        ]);
    }

    public function data(Request $request)
    {
        $id_layanan = $request->input('id');

        $query = DB::table('persyaratan')


                        ->where('layanan_id', $id_layanan)

                        ->get();
        // dd($query);
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>
            <a style="margin:1px" href="' . route('subpersyaratan.index', $list->persyaratan_id) . '"  class="btn btn-sm btn-warning"><i class="fa fa-pencil">Sub Persyaratan</i></a>
            <a href="' . route('persyaratan.edit', $list->persyaratan_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick= "deleteData('.$list->persyaratan_id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
        $layanan = Layanan::where('layanan_id',$id)->first();
        // dd($layanan);
        return view('admin.admin_pengaduan.createPersyaratan',[
            'layanan' => $layanan,
        ]);
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "persyaratan" => "required",


        ])->validate();

        $persyaratan = new Persyaratan;
        $persyaratan->uraian_persyaratan = $request->get('persyaratan');
        $persyaratan->layanan_id = $request->get('layanan_id');

        $layanan_id = $request->get('layanan_id');
        $persyaratan->save();
        session()->flash('success', 'Data Berhasil Disimpan.');
        return redirect()->route('persyaratan.index', $layanan_id);
    }

    public function edit($id)
    {
        $persyaratan = Persyaratan::findOrFail($id);

        // dd($layanan);
        return view('admin.admin_pengaduan.editPersyaratan',[
            'persyaratan' => $persyaratan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(),[
            "persyaratan" => "required",


        ])->validate();

        $persyaratan= Persyaratan::findOrFail($id);
        $persyaratan->uraian_persyaratan = $request->get('persyaratan');

        $layanan = $persyaratan->layanan_id;

        $persyaratan->save();
        session()->flash('success', 'Data Berhasil Diupdate.');
        return redirect()->route('persyaratan.index', $layanan);
    }

    public function destroy($id)
    {
        // dd($id);
        Persyaratan::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->back();
    }
}


