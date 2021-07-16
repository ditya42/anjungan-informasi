<?php

namespace App\Http\Controllers\Admin;

use App\Aduan;
use App\DasarLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\Persyaratan;
use App\Prosedur;
use App\Subbidang;
use Illuminate\Support\Facades\Gate;
use DB;
use DataTables;
use App\User;
use SweetAlert;
use File;
use Illuminate\Support\Facades\DB as IlluminateDB;

class AduanController extends Controller
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

        return view('admin.admin_pengaduan.indexAduan',[
            'layanan' => $cek,
        ]);
    }

    public function data(Request $request)
    {
        $id_layanan = $request->input('id');

        $query = DB::table('pengelolaan_aduan')


                        ->where('layanan_id', $id_layanan)

                        ->get();
        // dd($query);
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>
            <a href="' . route('aduan.edit', $list->pengelolaan_aduan_id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
            <a onclick= "deleteData('.$list->pengelolaan_aduan_id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
        return view('admin.admin_pengaduan.createAduan',[
            'layanan' => $layanan,
        ]);
    }

    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "aduan" => "required",


        ])->validate();

        $aduan = new Aduan;
        $aduan->uraian_pengelolaan_aduan = $request->get('aduan');
        $aduan->layanan_id = $request->get('layanan_id');

        $layanan_id = $request->get('layanan_id');
        $aduan->save();
        session()->flash('success', 'Data Berhasil Disimpan.');
        return redirect()->route('aduan.index', $layanan_id);
    }

    public function edit($id)
    {
        $aduan = Aduan::findOrFail($id);

        // dd($layanan);
        return view('admin.admin_pengaduan.editAduan',[
            'aduan' => $aduan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(),[
            "aduan" => "required",


        ])->validate();

        $aduan = Aduan::findOrFail($id);
        $aduan->uraian_pengelolaan_aduan = $request->get('aduan');

        $layanan = $aduan->layanan_id;

        $aduan->save();
        session()->flash('success', 'Data Berhasil Diupdate.');
        return redirect()->route('aduan.index', $layanan);
    }

    public function destroy($id)
    {
        // dd($id);
        Aduan::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->back();
    }
}
