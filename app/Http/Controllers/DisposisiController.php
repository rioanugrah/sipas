<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disposisi;
use \Carbon\Carbon;
use Validator;
use DataTables;
use DB;
class DisposisiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->is_role == 1){
                $data = Disposisi::all();
            }else{
                $data = Disposisi::where('diterima',auth()->user()->unit_kerja_id)
                                    ->get();
            }
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('tanggal_surat', function($row){
                            // return '-';
                            return Carbon::parse($row->surat->tanggal_surat)->isoFormat('LL');
                        })
                        ->addColumn('dari', function($row){
                            // return '-';
                            return $row->user->name.' - '.$row->user->unit_kerja->unit_kerja;
                        })
                        ->addColumn('nomor_surat_masuk', function($row){
                            return '<a href="'.route('disposisi.detail',['id' => $row->id]).'">'.$row->surat->nomor_surat_masuk.'</a>';
                            // return Carbon::parse($row->tanggal_surat)->isoFormat('LL');
                        })
                        // ->addColumn('action', function($row){
                        //     $btn = '<button type="button" onclick="view(`'.$row->id.'`)" class="btn btn-success right_note" title="View"><i class="fa fa-eye"></i></button>';
                        //     return $btn;
                        // })
                        ->rawColumns(['nomor_surat_masuk'])
                        ->make(true);
        }
        return view('backend.disposisi.index');
    }

    public function detail($id)
    {
        $data['disposisi'] = Disposisi::find($id);
        $data['disposisis'] = Disposisi::where('id',$id)->where('diterima',auth()->user()->unit_kerja_id)->get();
        return view('backend.disposisi.view',$data);
    }
}
