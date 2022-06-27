<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Instansi;
use App\Models\SuratMasuk;
use App\Models\Klasifikasi;
use \Carbon\Carbon;
use Validator;
use DataTables;
use DB;
class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->is_role == 1){
                $data = SuratMasuk::all();
            }else{
                $data = SuratMasuk::where('user_pengirim_id','!=',auth()->user()->id)
                                    ->where('unit_kerja_id',auth()->user()->unit_kerja_id)
                                    ->get();
            }
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('sifat_surat', function($row){
                            if ($row->status_surat == 1) {
                                return 'Segera';
                            }
                            elseif ($row->status_surat == 2) {
                                return 'Penting';
                            }
                            elseif ($row->status_surat == 3) {
                                return 'Rahasia';
                            }
                            elseif ($row->status_surat == 4) {
                                return 'Biasa';
                            }
                        })
                        ->addColumn('tanggal_surat', function($row){
                            // return '-';
                            return Carbon::parse($row->tanggal_surat)->isoFormat('LL');
                        })
                        ->addColumn('nomor_surat_masuk', function($row){
                            return '<a href="'.route('surat_masuk.pages',['id' => $row->id]).'">'.$row->nomor_surat_masuk.'</a>';
                            // return Carbon::parse($row->tanggal_surat)->isoFormat('LL');
                        })
                        ->addColumn('pengirim', function($row){
                            return '-';
                        })
                        ->addColumn('disposisi', function($row){
                            return '-';
                        })
                        ->addColumn('action', function($row){
                            $btn = '<button type="button" onclick="edit(`'.$row->id.'`)" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></button>';
                            $btn = $btn.'<button type="button" data-type="confirm" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>';
                            return $btn;
                        })
                        ->rawColumns(['action','nomor_surat_masuk'])
                        ->make(true);
        }
        if(auth()->user()->is_role == 1){
            return view('backend.surat_masuk.administrator');
        }else{
            if(auth()->user()->instansi_id == null){
                $data['instansi'] = null;
                // return view('backend.surat_masuk.administrator');
            }else{
                $data['instansi'] = auth()->user()->instansi->nama_instansi;
            }
            $data['klasifikasis'] = Klasifikasi::where('instansi_id',auth()->user()->instansi_id)->get();
            return view('backend.surat_masuk.index',$data);
        }
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nomor_surat_masuk' => 'required',
            'isi_ringkasan' => 'required',
            'keterangan' => 'required',
            'tanggal_surat' => 'required',
        ];

        $messages = [
            'nomor_surat_masuk.required'  => 'Unit Kerja Wajib Diisi.',
            'isi_ringkasan.required'  => 'Unit Kerja Wajib Diisi.',
            'keterangan.required'  => 'Unit Kerja Wajib Diisi.',
            'tanggal_surat.required'  => 'Unit Kerja Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['status'] = 'Close';
            $input['status_surat'] = '1';
            $input['asal_surat'] = auth()->user()->instansi_id;
            $suratMasuk = SuratMasuk::create($input);

            if($suratMasuk){
                $message_title="Berhasil !";
                $message_content="Surat Terkirim";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);
        }
        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function page($id)
    {
        $surat_masuk = SuratMasuk::find($id);
        // if (empty($surat_Keluar)) {
        //     return redirect()->back();
        // }
        return view('backend.surat_masuk.view',compact('surat_masuk'));
    }
}
