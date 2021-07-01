<?php

namespace App\Http\Controllers\Admin;

use App\DasarLayanan;
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

class DasarLayananController extends Controller
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

        return view('admin.admin_pengaduan.indexDasarLayanan',[
            'layanan' => $cek,
        ]);
    }


    public function data(Request $request)
    {
        $id_layanan = $request->input('id');

        $query = DB::table('dasar_layanan')
                        ->leftJoin('dasar_hukum','dasar_layanan.dasarhukum_id','=','dasar_hukum.dasarhukum_id')

                        ->where('layanan_id', $id_layanan)
                        ->select('dasarlayanan_id', 'nama_peraturan', 'tentang')
                        ->get();
        // dd($query);
        return DataTables::of($query)
        ->addColumn('action', function ($list) {
            return '
            <center>

            <a onclick= "deleteData('.$list->dasarlayanan_id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </center>
            ';
        })
        ->addIndexColumn('id')
        ->toJson();


        // <a href="' . route('subbidang.edit', $list->id) . '"  class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
        //     <a onclick="deleteData('.$list->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
    }


    public function destroy($id)
    {

        DasarLayanan::destroy($id);
        session()->flash('success', 'Data Berhasil Dihapus.');
        return redirect()->back();
    }
}
