<?php

namespace App\Http\Controllers\Branch;


use App\Http\Controllers\Controller;
use App\Models\Branch\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchList = Branch::where('branch_status',1)->get();
        return view('pages.branch.list_branch',compact('branchList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.branch.create_branch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch_name' => 'required',
            // 'deligate_phone' => 'required',
            // 'deligate_email' => 'required',
            // 'deligate_transaction_opening_balance' => 'required',
            // 'deligate_licence_file' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
            // 'deligate_picture' => 'mimes:jpg,png,jpeg|max:2048',
        ]);


        $branch = new Branch();
        $branch->branch_name = $request->branch_name;
        $branch->branch_entry_id = $request->branch_entry_id;
        $branch->branch_phone_number = $request->branch_phone_number;
        $branch->branch_address = $request->branch_address;
        $branch->branch_created_by =  Auth::user()->id;
        $branch->created_at = date("Y/m/d");
        $branch->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Branch::where('branch_id',$id)->first();
        return view('pages.branch.edit_branch',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Branch::where('branch_id',$request->branch_id)->update([
            'branch_name' => $request->branch_name,
            'branch_entry_id' => $request->branch_entry_id,
            'branch_phone_number' => $request->branch_phone_number,
            'branch_address' => $request->branch_address,
            'branch_updated_by' => Auth::user()->id,
            'updated_at' => date("Y/m/d"),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::where('branch_id',$id)->update([
            'branch_deleted_by' => Auth::user()->id,
            'branch_status' => 0,
            'branch_is_deleted' => "YES",
        ]);
    }

    public function branchSearch(Request $request)
    {
        $branch = Branch::where('branch_name','like',"%{$request->q}%")->orWhere('branch_entry_id','like',"%{$request->q}%")->orWhere('branch_phone_number','like',"%{$request->q}%")->get();
        // print_r($clients);
        // die;
        $branch_array = array();
        foreach ($branch as $branch) {
            $label = $branch['branch_name'] . '(' . $branch['branch_entry_id'] . ')';
            $value = intval($branch['branch_id']);
            $branch_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $branch_array);
        echo json_encode($result);
        exit;
    }
}
