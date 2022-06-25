<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Instansi;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Klasifikasi;
use App\Models\UnitKerja;
use \Carbon\Carbon;
use Validator;
use DataTables;
class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->is_role == 1){
                $data = SuratKeluar::all();
            }else{
                // $data = SuratKeluar::all();
                $data = SuratKeluar::where('user_pengirim_id',auth()->user()->id)
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
                        ->addColumn('nomor_surat_keluar', function($row){
                            return '<a href="'.route('surat_keluar.pages',['id' => $row->id]).'">'.$row->nomor_surat_keluar.'</a>';
                            // return Carbon::parse($row->tanggal_surat)->isoFormat('LL');
                        })
                        // ->addColumn('disposisi', function($row){
                        //     return '-';
                        // })
                        ->addColumn('action', function($row){
                            $btn = '<a href="'.route('surat_keluar.pages',['id' => $row->id]).'" onclick="folder(`'.$row->id.'`)" class="btn btn-success" title="Open"><i class="fa fa-folder"></i></a>';
                            // $btn = $btn.'<button type="button" data-type="confirm" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>';
                            return $btn;
                        })
                        ->rawColumns(['action','nomor_surat_keluar'])
                        ->make(true);
        }
        if(auth()->user()->instansi_id == null){
            $data['instansi'] = null;
            // return view('backend.surat_masuk.administrator');
        }else{
            $data['instansi'] = auth()->user()->instansi->nama_instansi;
        }
        $data['klasifikasis'] = Klasifikasi::where('instansi_id',auth()->user()->instansi_id)->get();
        $data['unit_kerjas'] = UnitKerja::where('instansi_id',auth()->user()->instansi_id)->get();
        return view('backend.surat_keluar.index',$data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nomor_surat_keluar' => 'required',
            'nomor_agenda_surat_keluar' => 'required',
            'isi_ringkasan' => 'required',
            'keterangan' => 'required',
            'tanggal_surat' => 'required',
            'tujuan_surat' => 'required',
            'status_surat' => 'required',
            'isi_ringkasan' => 'required',
            'keterangan' => 'required',
            'klasifikasi_id' => 'required',
        ];

        $messages = [
            'nomor_surat_keluar.required'  => 'Nomor Surat Wajib Diisi.',
            'nomor_agenda_surat_keluar.required'  => 'Nomor Agenda Wajib Diisi.',
            'isi_ringkasan.required'  => 'Isi Ringkasan Wajib Diisi.',
            'keterangan.required'  => 'Keterangan Wajib Diisi.',
            'tanggal_surat.required'  => 'Tanggal Surat Wajib Diisi.',
            'tujuan_surat.required'  => 'Tujuan Surat Wajib Diisi.',
            'status_surat.required'  => 'Status Surat Wajib Diisi.',
            'isi_keterangan.required'  => 'Keterangan Wajib Diisi.',
            'klasifikasi_id.required'  => 'Klasifikasi Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            // Input Surat Keluar
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['status'] = 'Close';
            $input['tanggal_terima'] = null;
            $input['user_pengirim_id'] = auth()->user()->id;
            $input['asal_surat'] = auth()->user()->instansi_id;

            // $fileSurat = $request->file('file');
            // $fileName = $fileSurat->getClientOriginalExtension();
            // $input['file'] = $fileName;
            // $fileName->move(public_path('backend_4/berkas/'),$input['file']);
            if ($request->hasFile('file')) {
                $destinationPath = public_path('backend_4/berkas/');
                $files = $request->file('file'); // will get all files
                $file_name = $files->getClientOriginalName(); //Get file original name
                $files->move($destinationPath , $file_name); // move files to destination folder
            }
            $suratKeluar = SuratKeluar::create($input);

            // Input Surat Masuk
            $input2['id'] = Str::uuid()->toString();
            $input2['user_pengirim_id'] = $input['user_pengirim_id'];
            $input2['nomor_surat_masuk'] = $request->nomor_surat_keluar;
            $input2['nomor_agenda_surat_masuk'] = $request->nomor_agenda_surat_keluar;
            $input2['asal_surat'] = auth()->user()->instansi_id;
            $input2['isi_ringkasan'] = $request->isi_ringkasan;
            $input2['klasifikasi_id'] = $request->klasifikasi_id;
            $input2['tanggal_surat'] = $request->tanggal_surat;
            $input2['status_surat'] = $request->status_surat;
            $input2['keterangan'] = $request->keterangan;
            $input2['status'] = 'Close';
            $input2['file'] = $files;
            $suratMasuk = SuratMasuk::create($input2);

            if($suratKeluar){
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
        $surat_keluar = SuratKeluar::find($id);
        // if (empty($surat_Keluar)) {
        //     return redirect()->back();
        // }
        return view('backend.surat_keluar.view',compact('surat_keluar'));
    }
}
