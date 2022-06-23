<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Instansi;
use App\Models\UnitKerja;
use Validator;
use DataTables;
class UnitKerjaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = UnitKerja::all();
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('instansi', function($row){
                            return $row->instansi->nama_instansi;
                            // return '<a href="javascript:void()" onclick="detail(`'.$row->id.'`)">'.$row->nama_instansi.'</a>';
                        })
                        ->addColumn('action', function($row){
                            $btn = '<button type="button" onclick="edit(`'.$row->id.'`)" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></button>';
                            $btn = $btn.'<button type="button" data-type="confirm" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>';
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
        return view('backend.unit_kerja.index',$data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'unit_kerja' => 'required',
        ];

        $messages = [
            'unit_kerja.required'  => 'Unit Kerja Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['instansi_id'] = auth()->user()->instansi_id;
            $unitKerja = UnitKerja::create($input);

            if($unitKerja){
                $message_title="Berhasil !";
                $message_content="Data Instansi ".$input['unit_kerja']." Berhasil Dibuat";
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

    public function edit($id)
    {
        $unitKerja = UnitKerja::find($id);
        if(empty($unitKerja)){
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $unitKerja->id,
                'unit_kerja' => $unitKerja->unit_kerja,
                'instansi' => $unitKerja->instansi->nama_instansi
            ]
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'edit_unit_kerja' => 'required',
        ];

        $messages = [
            'edit_unit_kerja.required'  => 'Unit Kerja Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $unitKerja = UnitKerja::find($request->edit_id);
            $input['unit_kerja'] = $request->edit_unit_kerja;
            $input['instansi_id'] = auth()->user()->instansi_id;
            $unitKerja->update($input);

            if($unitKerja){
                $message_title="Berhasil !";
                $message_content="Data Instansi ".$input['unit_kerja']." Berhasil Diubah";
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
