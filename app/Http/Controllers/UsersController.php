<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
use Validator;
use Auth;
use Illuminate\Support\Str;
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
            return view('backend.users.index');
        }else{
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
}
