<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\klasifikasi;
use Validator;
use DataTables;
class KlasifikasiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Klasifikasi::all();
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('instansi', function($row){
                            return $row->instansi_id;
                            // return '<a href="javascript:void()" onclick="detail(`'.$row->id.'`)">'.$row->nama_instansi.'</a>';
                        })
                        ->addColumn('action', function($row){
                            $btn = '<button type="button" onclick="detail(`'.$row->id.'`)" class="btn btn-success" data-toggle="modal" title="View"><i class="fa fa-eye"></i></button>';
                            $btn = $btn.'<button type="button" onclick="edit('.$row->id.')" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></button>';
                            $btn = $btn.'<button type="button" onclick="hapus('.$row->id.')" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>';
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
        return view('backend.klasifikasi.index');
    }
}
