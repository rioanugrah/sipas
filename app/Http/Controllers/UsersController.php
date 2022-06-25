<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\UnitKerja;
use App\Models\Roles;
use App\User;
use DataTables;
use Validator;
use Hash;
use Auth;
class UsersController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->is_role == 1) {
            if ($request->ajax()) {
                $data = User::all();
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('id_user', function($row){
                            // echo json_encode($row->id);
                            return Str::slug($row->id);
                        })
                        ->addColumn('instansi', function($row){
                            // echo json_encode($row->id);
                            if($row->instansi_id == null){
                                return '-';
                            }
                            return $row->instansi->nama_instansi;
                        })
                        ->addColumn('unit_kerja', function($row){
                            // echo json_encode($row->id);
                            if($row->unit_kerja_id == null){
                                return '-';
                            }else{
                                return $row->unit_kerja_id;
                            }
                        })
                        ->addColumn('action', function($row){
                            $btn = '<div class="btn-group">';
                            $btn = $btn.'<a href="#" class="btn btn-success btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fa fa-eye"></i> View</a>';
                            $btn = $btn.'<a href="#" class="btn btn-warning btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fa fa-edit"></i> Edit</a>';
                            $btn = $btn.'<a href="#" class="btn btn-danger btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fa fa-trash"></i> Delete</a>';
                            $btn = $btn.'</div>';
                            return $btn;
                        })
                        ->rawColumns(['action','id_user'])
                        ->make(true);
            }
            $data['unit_kerja'] = UnitKerja::where('instansi_id',auth()->user()->instansi_id)->get();
            if(auth()->user()->is_role == 1){
                $data['roles'] = Roles::all();
            }else{
                $data['roles'] = Roles::where('id','!=',1)->get();
            }
            if (auth()->user()->instansi_id != null) {
                $data['instansi'] = auth()->user()->instansi->nama_instansi;
            }
            else{
                $data['instansi'] = null;
            }
            return view('backend.users.index',$data);
        }elseif(auth()->user()->is_role == 2){
            if ($request->ajax()) {
                $data = User::where('instansi_id',auth()->user()->instansi_id)->get();
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('id_user', function($row){
                            // echo json_encode($row->id);
                            return Str::slug($row->id);
                        })
                        ->addColumn('instansi', function($row){
                            // echo json_encode($row->id);
                            if($row->instansi_id == null){
                                return '-';
                            }
                            return $row->instansi->nama_instansi;
                        })
                        ->addColumn('unit_kerja', function($row){
                            // echo json_encode($row->id);
                            if($row->unit_kerja_id == null){
                                return '-';
                            }else{
                                return $row->unit_kerja_id;
                            }
                        })
                        ->addColumn('action', function($row){
                            $btn = '<div class="btn-group">';
                            $btn = $btn.'<a href="#" class="btn btn-success btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fa fa-eye"></i> View</a>';
                            $btn = $btn.'<a href="#" class="btn btn-warning btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fa fa-edit"></i> Edit</a>';
                            $btn = $btn.'<a href="#" class="btn btn-danger btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fa fa-trash"></i> Delete</a>';
                            $btn = $btn.'</div>';
                            return $btn;
                        })
                        ->rawColumns(['action','id_user'])
                        ->make(true);
            }
            $data['unit_kerja'] = UnitKerja::where('instansi_id',auth()->user()->instansi_id)->get();
            $data['roles'] = Roles::where('id','>',2)->get();
            if (auth()->user()->instansi_id != null) {
                $data['instansi'] = auth()->user()->instansi->nama_instansi;
            }
            else{
                $data['instansi'] = null;
            }
            return view('backend.users.index',$data);
        }
        else{
            $user = User::find(auth()->user()->id);
            return redirect(route('index.user', ['id' => $user->id]));
        }
    }

    public function index_user($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('backend.users.user',compact('user'));
    }

    public function simpan(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'unit_kerja_id' => 'required',
            // 'is_role' => 'required',
        ];

        $messages = [
            'name.required'  => 'Nama Wajib Diisi.',
            'email.required'  => 'Email Wajib Diisi.',
            'email.unique'  => 'Email Sudah Ada.',
            // 'unit_kerja_id.required'  => 'Unit Kerja Wajib Diisi.',
            // 'is_role.required'  => 'Akses User Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            if(auth()->user()->instansi_id == null){
                $input['instansi_id'] = null;
            }else{
                $input['instansi_id'] = auth()->user()->instansi_id;
            }

            if($request->unit_kerja_id == null){
                $input['unit_kerja_id'] = null;
            }
            if($request->is_role == null){
                $input['is_role'] = null;
            }
            
            $input['password'] = Hash::make('user1234');
            $users = User::create($input);
            // dd($input);
            if($users){
                $message_title="Berhasil !";
                $message_content="User ".$input['name']." Berhasil Dibuat";
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
