<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Models\Instansi;
use App\Models\klasifikasi;
use Validator;
use DataTables;
class KlasifikasiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->is_role == 1){
                $data = Klasifikasi::all();
            }else{
                $data = Klasifikasi::where('instansi_id',auth()->user()->instansi_id)->get();
            }
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('instansi', function($row){
                            return $row->instansi->nama_instansi;
                        })
                        ->addColumn('action', function($row){
                            $btn = '<button type="button" onclick="detail(`'.$row->id.'`)" class="btn btn-success" data-toggle="modal" title="View"><i class="fa fa-eye"></i></button>';
                            $btn = $btn.'<button type="button" onclick="edit(`'.$row->id.'`)" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></button>';
                            $btn = $btn.'<button type="button" onclick="hapus(`'.$row->id.'`)" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>';
                            // $btn = '<div class="btn-group">';
                            // $btn = $btn.'<a href="#" class="btn btn-success btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fas fa-eye"></i> View</a>';
                            // $btn = $btn.'<a href="#" class="btn btn-warning btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fas fa-edit"></i> Edit</a>';
                            // $btn = $btn.'<a href="#" class="btn btn-danger btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fas fa-trash"></i> Delete</a>';
                            // $btn = $btn.'</div>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        $data['instansi'] = Instansi::find(auth()->user()->instansi_id);
        if(empty($data['instansi'])){
            return redirect()->back();
        }
        return view('backend.klasifikasi.index',$data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'kode_klasifikasi' => 'required',
            'judul_klasifikasi' => 'required',
            'keterangan' => 'required',
        ];

        $messages = [
            'kode_klasifikasi.required'  => 'Kode Klasifikasi Wajib Diisi.',
            'judul_klasifikasi.required'  => 'Judul Klasifikasi Wajib Diisi.',
            'keterangan.required'  => 'Keterangan Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['instansi_id'] = auth()->user()->instansi_id;
            
            $klasifikasi = Klasifikasi::create($input);

            if($klasifikasi){
                $message_title="Berhasil !";
                $message_content="Kode ".$input['kode_klasifikasi']." dan Judul ".$input['judul_klasifikasi']." Berhasil Dibuat";
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

    public function detail($id)
    {
        $klasifikasi = Klasifikasi::find($id);
        if(empty($klasifikasi)){
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => [
                'kode_klasifikasi' => $klasifikasi->kode_klasifikasi,
                'judul_klasifikasi' => $klasifikasi->judul_klasifikasi,
                'keterangan' => $klasifikasi->keterangan,
                'instansi' => $klasifikasi->instansi->nama_instansi,
            ]
        ]);
    }

    public function edit($id)
    {
        $klasifikasi = Klasifikasi::find($id);
        if(empty($klasifikasi)){
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => [
                'id' => $klasifikasi->id,
                'kode_klasifikasi' => $klasifikasi->kode_klasifikasi,
                'judul_klasifikasi' => $klasifikasi->judul_klasifikasi,
                'keterangan' => $klasifikasi->keterangan,
                'instansi' => $klasifikasi->instansi->nama_instansi,
            ]
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'edit_kode_klasifikasi' => 'required',
            'edit_judul_klasifikasi' => 'required',
            'edit_keterangan' => 'required',
        ];

        $messages = [
            'edit_kode_klasifikasi.required'  => 'Kode Klasifikasi Wajib Diisi.',
            'edit_judul_klasifikasi.required'  => 'Judul Klasifikasi Wajib Diisi.',
            'edit_keterangan.required'  => 'Keterangan Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            // $input = $request->all();
            // $input['id'] = Str::uuid()->toString();
            // $input['instansi_id'] = auth()->user()->instansi_id;
            $klasifikasi = Klasifikasi::find($request->edit_id);
            $input['kode_klasifikasi'] = $request->edit_kode_klasifikasi;
            $input['judul_klasifikasi'] = $request->edit_judul_klasifikasi;
            $input['keterangan'] = $request->edit_keterangan;
            $klasifikasi->update($input);

            if($klasifikasi){
                $message_title="Berhasil !";
                $message_content="Kode ".$input['kode_klasifikasi']." dan Judul ".$input['judul_klasifikasi']." Berhasil Diubah";
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
