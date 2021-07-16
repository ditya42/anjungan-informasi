<?php

namespace App\Http\Controllers\frontend;

use App\Aduan;
use App\DasarHukum;
use App\DasarLayanan;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Model\Category;
use App\Helpers\Helper;
use App\Layanan;
use App\Model\Post;
use App\Model\Tag;
use App\Model\CategoryPost;
use App\Model\PostTag;
use App\Pelaksana;
use App\Penyelesaian;
use App\Persyaratan;
use App\Produk;
use App\Prosedur;
use App\Subbidang;
use App\SubPersyaratan;
use App\SubProsedur;
use DataTables;
use File;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subbidang = Subbidang::all();
        // dd($subbidang);

        return view('frontend.index' ,[
            'subbidang' => $subbidang
        ]);
    }

    public function layanan(Request $request, $id)
    {
        $layanan = Layanan::where('subbidang_id' , $id)->get();
        $subbidang = Subbidang::find($id);

        // $layanan  = $id;
        // dd($layanan);

        return view('frontend.layanan', [
            'layanan'=>$layanan,
            'subbidang' => $subbidang
        ]);
    }

    public function syarat(Request $request, $id)
    {
        $layanan = Layanan::find($id);
        $persyaratan  = Persyaratan::where('layanan_id' , $id)->get();
        $subbidang = Subbidang::find($request->subbidang);
        $prosedur = Prosedur::where('layanan_id' , $id)->get();
        $penyelesaian = Penyelesaian::where('layanan_id' , $id)->get();
        $pelaksana = Pelaksana::where('layanan_id' , $id)->get();
        $aduan = Aduan::where('layanan_id' , $id)->get();
        $produk = Produk::where('layanan_id' , $id)->get();
        $subpersyaratan = SubPersyaratan::all();
        $subprosedur = SubProsedur::all();


        $query = DB::table('dasar_layanan')
                        ->leftJoin('dasar_hukum','dasar_layanan.dasarhukum_id','=','dasar_hukum.dasarhukum_id')

                        ->where('layanan_id', $id)
                        ->select('dasarlayanan_id', 'nama_peraturan', 'tentang')
                        ->get();

        // dd($persyaratan);

        return view('frontend.persyaratan', [
            'persyaratan'=>$persyaratan,
            'subbidang'=>$subbidang,
            'prosedur'=>$prosedur,
            'dasarhukum'=>$query,
            'layanan' => $layanan,
            'penyelesaian' => $penyelesaian,
            'pelaksana' => $pelaksana,
            'aduan' => $aduan,
            'produk' => $produk,
            'subpersyaratan' => $subpersyaratan,
            'subprosedur' => $subprosedur
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
