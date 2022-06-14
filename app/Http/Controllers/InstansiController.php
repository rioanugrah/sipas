<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Instansi;
use Validator;
use DataTables;
class InstansiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Instansi::all();
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<button type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>';
                            $btn = $btn.'<button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>';
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
            $imageInstansi = $request->file('logo_instansi');

            $imgInstansi = \Image::make($imageInstansi->path());
            $imgInstansi = $imgInstansi->encode('webp', 75);
            $input['logo_instansi'] = time().'.webp';
            $imgInstansi->save(public_path('backend_2/logo_instansi/').$input['logo_instansi']);
            
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
}
