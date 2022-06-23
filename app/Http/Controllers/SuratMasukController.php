<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Instansi;
use App\Models\SuratMasuk;
use \Carbon\Carbon;
use Validator;
use DataTables;
class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SuratMasuk::all();
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('sifat_surat', function($row){
                            return '-';
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
                        ->rawColumns(['action'])
                        ->make(true);
        }
        return view('backend.surat_masuk.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nomor_surat_masuk' => 'required',
            'asal_surat' => 'required',
            'isi_ringkasan' => 'required',
            'keterangan' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_terima' => 'required',
        ];

        $messages = [
            'nomor_surat_masuk.required'  => 'Unit Kerja Wajib Diisi.',
            'asal_surat.required'  => 'Unit Kerja Wajib Diisi.',
            'isi_ringkasan.required'  => 'Unit Kerja Wajib Diisi.',
            'keterangan.required'  => 'Unit Kerja Wajib Diisi.',
            'tanggal_surat.required'  => 'Unit Kerja Wajib Diisi.',
            'tanggal_terima.required'  => 'Unit Kerja Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['status'] = 'Open';
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
}
