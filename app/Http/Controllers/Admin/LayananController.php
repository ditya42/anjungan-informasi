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
use Illuminate\Support\Facades\DB as IlluminateDB;

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
        $query = DB::table('layanan')
                ->leftjoin('sub_bidang', 'sub_bidang.subbidang_id', '=', 'layanan.subbidang_id')
                ->get();
        // $query = Layanan::orderBy('created_at','asc');
        // dd($query);
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>
            <a style="margin:1px" href="' . route('dasarlayanan.index', $list->layanan_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil">DasarHukum</i></a>
            <a style="margin:1px" href="' . route('persyaratan.index', $list->layanan_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil">Persyaratan</i></a>
            <a style="margin:1px" href="' . route('prosedur.index', $list->layanan_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil">Prosedur</i></a>
            <a style="margin:1px" href="' . route('penyelesaian.index', $list->layanan_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil">Waktu Penyelesaian</i></a>
            <a style="margin:1px" href="' . route('pelaksana.index', $list->layanan_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil">Kompetensi Pelaksana</i></a>
            <a style="margin:1px" href=""  class="btn btn-sm btn-success"><i class="fa fa-pencil">Pengelolaan Aduan</i></a>
            <a style="margin:1px" href=""  class="btn btn-sm btn-success"><i class="fa fa-pencil">Produk Layanan</i></a>
            <a style="margin:1px" href="' . route('layanan.edit', $list->layanan_id) . '"  class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>Edit</a>
            <a style="margin:1px" onclick="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Hapus</a>
            </center>
            ';
        })
        ->addIndexColumn('id')
        ->toJson();


        // $suratkeluar = DB::table('sppd_suratkeluar')
        //                 ->leftjoin('tb_skpd', 'tb_skpd.skpd_id','=', 'sppd_suratkeluar.skpd')
        //                 ->where('deleted_at', null)
        //                 ->where('tahun', $tahun)
        //                 ->get();
        // <a href="' . route('subbidang.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
        //     <a onclick="deleteData('.$list->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
    }

    public function create()
    {
        $subbidang = Subbidang::orderBy('created_at','asc')->get();
        // dd($subbidang);
        return view('admin.admin_pengaduan.createLayanan',[
            'subbidang' => $subbidang,
        ]);
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required",
            "biaya" => "required",
            "subbidang" => "required"

        ])->validate();

        $nama =  $request->get('name');
        $check = Layanan::where('nama_layanan', $nama )->first();
        // dd($check);



        $layanan = new Layanan;
        $layanan->nama_layanan = $request->get('name');
        $layanan->biaya = $request->get('biaya');
        $layanan->subbidang_id = $request->get('subbidang');

        if($check != NULL) {
            session()->flash('error', 'Data Sudah Ada.');
            return redirect()->route('layanan.index');
        } else {


            $layanan->save();
            session()->flash('success', 'Data Berhasil Disimpan.');
            return redirect()->route('layanan.index');
        }

    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);

        $subbidang = Subbidang::orderBy('created_at','asc')->get();
        // dd($subbidang);
        return view('admin.admin_pengaduan.editLayanan', [
            'layanan' => $layanan,
            'subbidang' => $subbidang
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required",
            "biaya" => "required",
            "subbidang" => "required"


        ])->validate();

        $nama =  $request->get('name');
        $check = Layanan::where('nama_layanan', $nama )
                ->where('layanan_id', '!=' , $id)
                ->first();


        $layanan = Layanan::findOrFail($id);
        $layanan->nama_layanan = $request->get('name');
        $layanan->biaya = $request->get('biaya');
        $layanan->subbidang_id = $request->get('subbidang');


        if($check != NULL) {
            session()->flash('error', 'Data Sudah Ada.');
            return redirect()->back();
        } else {

            $layanan->save();
            session()->flash('success', 'Data Berhasil Diupdate.');
            return redirect()->route('layanan.index');
        }


    }
}
