<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Instansi;
use App\User;
use Validator;
use DataTables;
class InstansiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->is_role == 1){
                $data = Instansi::all();
            }else{
                $data = Instansi::where('id',auth()->user()->instansi_id)->get();
            }
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nama_instansi', function($row){
                        return '<a href="javascript:void()" onclick="detail(`'.$row->id.'`)">'.$row->nama_instansi.'</a>';
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
                    ->rawColumns(['action','nama_instansi'])
                    ->make(true);
        }
        return view('backend.instansi.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_instansi' => 'required',
            'nama_lembaga' => 'required',
            'alamat_instansi' => 'required',
            'nama_kepala_instansi' => 'required',
            'nip_instansi' => 'required',
            'npwp_instansi' => 'required',
            'email_instansi' => 'required',
            'telp_instansi' => 'required',
        ];

        $messages = [
            'nama_instansi.required'  => 'Instansi Wajib Diisi.',
            'nama_lembaga.required'  => 'Lembaga Wajib Diisi.',
            'alamat_instansi.required'  => 'Alamat Instansi Wajib Diisi.',
            'nama_kepala_instansi.required'  => 'Kepala Instansi Wajib Diisi.',
            'nip_instansi.required'  => 'NIP Instansi Wajib Diisi.',
            'npwp_instansi.required'  => 'NPWP Instansi Wajib Diisi.',
            'email_instansi.required'  => 'Email Instansi Wajib Diisi.',
            'telp_instansi.required'  => 'Telpon Instansi Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['status_instansi'] = 1;
            $user = User::where('id',auth()->user()->id)->update([
                'instansi_id' => $input['id']
            ]);
            if($input['logo_instansi'] != null){
                $imageInstansi = $request->file('logo_instansi');
    
                $imgInstansi = \Image::make($imageInstansi->path());
                $imgInstansi = $imgInstansi->encode('webp', 75);
                $input['logo_instansi'] = time().'.webp';
                $imgInstansi->save(public_path('backend_4/logo_instansi/').$input['logo_instansi']);
            }
            
            $instansi = Instansi::create($input);

            if($instansi){
                $message_title="Berhasil !";
                $message_content="Data Instansi ".$input['nama_instansi']." Berhasil Dibuat";
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
        $instansi = Instansi::find($id);
        if(empty($instansi)){
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => [
                'id' => $instansi->id,
                'nama_instansi' => $instansi->nama_instansi,
                'nama_lembaga' => $instansi->nama_lembaga,
                'alamat_instansi' => $instansi->alamat_instansi,
                'status_instansi' => $instansi->status_instansi == 1 ? 'Active' : 'Inactive',
                'nama_kepala_instansi' => $instansi->nama_kepala_instansi,
                'nip_instansi' => $instansi->nip_instansi,
                'npwp_instansi' => $instansi->npwp_instansi,
                'email_instansi' => $instansi->email_instansi,
                'telp_instansi' => $instansi->telp_instansi,
                'logo_instansi' => asset('backend_4/logo_instansi/'.$instansi->logo_instansi),
            ]
        ]);
    }

    public function edit($id)
    {
        $instansi = Instansi::find($id);
        if(empty($instansi)){
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => $instansi
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'edit_nama_instansi' => 'required',
            'edit_nama_lembaga' => 'required',
            'edit_alamat_instansi' => 'required',
            'edit_nama_kepala_instansi' => 'required',
            'edit_nip_instansi' => 'required',
            'edit_npwp_instansi' => 'required',
            'edit_email_instansi' => 'required',
            'edit_telp_instansi' => 'required',
        ];

        $messages = [
            'edit_nama_instansi.required'  => 'Instansi Wajib Diisi.',
            'edit_nama_lembaga.required'  => 'Lembaga Wajib Diisi.',
            'edit_alamat_instansi.required'  => 'Alamat Instansi Wajib Diisi.',
            'edit_nama_kepala_instansi.required'  => 'Kepala Instansi Wajib Diisi.',
            'edit_nip_instansi.required'  => 'NIP Instansi Wajib Diisi.',
            'edit_npwp_instansi.required'  => 'NPWP Instansi Wajib Diisi.',
            'edit_email_instansi.required'  => 'Email Instansi Wajib Diisi.',
            'edit_telp_instansi.required'  => 'Telpon Instansi Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            // $input = $request->all();
            $instansi = Instansi::find($request->edit_id);

            $input['nama_instansi'] = $request->edit_nama_instansi;
            $input['nama_lembaga'] = $request->edit_nama_lembaga;
            $input['alamat_instansi'] = $request->edit_alamat_instansi;
            $input['nama_kepala_instansi'] = $request->edit_nama_kepala_instansi;
            $input['nip_instansi'] = $request->edit_nip_instansi;
            $input['npwp_instansi'] = $request->edit_npwp_instansi;
            $input['email_instansi'] = $request->edit_email_instansi;
            $input['telp_instansi'] = $request->edit_telp_instansi;
            $input['status_instansi'] = 1;
            $user = User::where('id',auth()->user()->id)->update([
                'instansi_id' => $request->edit_id
            ]);
            if($request->edit_logo_instansi != null){
                $imageInstansi = $request->file('edit_logo_instansi');
    
                $imgInstansi = \Image::make($imageInstansi->path());
                $imgInstansi = $imgInstansi->encode('webp', 75);
                $input['logo_instansi'] = time().'.webp';
                $imgInstansi->save(public_path('backend_4/logo_instansi/').$input['logo_instansi']);
            }else{
                $input['logo_instansi'] = $instansi->logo_instansi;
            }
            $instansi->update($input);

            if($instansi){
                $message_title="Berhasil !";
                $message_content="Data Instansi ".$input['nama_instansi']." Berhasil Diubah";
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
