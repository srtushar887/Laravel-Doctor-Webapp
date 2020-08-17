<?php

namespace App\Http\Controllers\Doctor;

use App\diagnosis;
use App\examination;
use App\Http\Controllers\Controller;
use App\medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DcotorMasterDataController extends Controller
{
    public function medicine()
    {
        return view('doctor.masterdata.medicine');
    }

    public function medicine_get()
    {
        $all_medicine = medicine::where('doctor_id',Auth::user()->id)->latest();
        return DataTables::of($all_medicine)
            ->addColumn('action',function ($all_medicine){
                return ' <button id="'.$all_medicine->id .'" onclick="editmedicine(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#updatemedicine"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_medicine->id .'" onclick="deletemanu(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletemedicine"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }

    public function medicine_save(Request $request)
    {
        $new_medicine = new medicine();
        $new_medicine->doctor_id = Auth::user()->id;
        $new_medicine->medicine_name = $request->medicine_name;
        $new_medicine->save();
        return back()->with('success','Medicine Successfully Created');

    }

    public function medicine_single(Request $request)
    {
        $medicine_single = medicine::where('id',$request->id)->first();
        return $medicine_single;
    }


    public function medicine_update(Request $request)
    {
        $medicine_update = medicine::where('id',$request->medicine_edit_id)->first();
        $medicine_update->medicine_name = $request->medicine_name;
        $medicine_update->save();
        return back()->with('success','Medicine Successfully Updated');
    }


    public function medicine_delete(Request $request)
    {
        $medicine_delete = medicine::where('id',$request->medicine_delete_id)->first();
        $medicine_delete->delete();
        return back()->with('success','Medicine Successfully Deleted');
    }


    public function diagnosis()
    {
        return view('doctor.masterdata.diagnosis');
    }


    public function diagnosis_get()
    {
        $all_diagnosis = diagnosis::where('doctor_id',Auth::user()->id)->latest();
        return DataTables::of($all_diagnosis)
            ->addColumn('action',function ($all_diagnosis){
                return ' <button id="'.$all_diagnosis->id .'" onclick="editdiagnosis(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#updatediagnosis"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_diagnosis->id .'" onclick="deletediagnosis(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletediagnosis"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at', function ($user) {
                return [
                    'display' => e($user->created_at->format('m/d/Y')),
                    'timestamp' => $user->created_at->timestamp
                ];
            })
            ->make(true);
    }


    public function diagnosis_save(Request $request)
    {
        $new_diagnosis = new diagnosis();
        $new_diagnosis->doctor_id = Auth::user()->id;
        $new_diagnosis->diagnosis_name = $request->diagnosis_name;
        $new_diagnosis->save();
        return back()->with('success','Diagnosis Successfully Created');
    }

    public function diagnosis_single(Request $request)
    {
        $diagnosis_single = diagnosis::where('id',$request->id)->first();
        return $diagnosis_single;
    }


    public function diagnosis_update(Request $request)
    {
        $diagnosis_update = diagnosis::where('id',$request->diagnosis_edit_id)->first();
        $diagnosis_update->diagnosis_name = $request->diagnosis_name;
        $diagnosis_update->save();
        return back()->with('success','Diagnosis Successfully Updated');
    }


    public function diagnosis_delete(Request $request)
    {
        $delete_diagnosis = diagnosis::where('id',$request->diagnosis_delete_id)->first();
        $delete_diagnosis->delete();
        return back()->with('success','Diagnosis Successfully Deleted');
    }


    public function examination()
    {
        return view('doctor.masterdata.examination');
    }

    public function examination_get()
    {
        $all_exm = examination::where('doctor_id',Auth::user()->id)->latest();
        return DataTables::of($all_exm)
            ->addColumn('action',function ($all_exm){
                return ' <button id="'.$all_exm->id .'" onclick="editexamination(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#updatexm"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_exm->id .'" onclick="deleteexm(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#delexm"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at', function ($user) {
                return [
                    'display' => e($user->created_at->format('m/d/Y')),
                    'timestamp' => $user->created_at->timestamp
                ];
            })
            ->make(true);
    }



    public function examination_save(Request $request)
    {
        $new_exm = new examination();
        $new_exm->doctor_id = Auth::user()->id;
        $new_exm->examination_name = $request->examination_name;
        $new_exm->examination_remark = $request->examination_remark;
        $new_exm->save();
        return back()->with('success','Examination Successfully Deleted');
    }

    public function examination_single(Request $request)
    {
        $exm_single = examination::where('id',$request->id)->first();
        return $exm_single;
    }

    public function examination_update(Request $request)
    {
        $update_exm = examination::where('id',$request->examination_edit)->first();
        $update_exm->examination_name = $request->examination_name;
        $update_exm->examination_remark = $request->examination_remark;
        $update_exm->save();
        return back()->with('success','Examination Successfully Updated');
    }


    public function examination_delete(Request $request)
    {
        $delete_exm = examination::where('id',$request->examination_delete_id)->first();
        $delete_exm->delete();
        return back()->with('success','Examination Successfully Deleted');
    }











}
