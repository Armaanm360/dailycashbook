<?php

namespace App\Http\Controllers\Terms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terms\Terms;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TermsResource;
use Illuminate\Support\Facades\Validator;
class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_api_request = Request()->route()->getPrefix()==='api';

        if ($is_api_request) {
            $terms_list = Terms::where('terms_status',1)->get();
            return Terms::collection($terms_list);
        }else {
            $data['terms_list'] = Terms::where('terms_status',1)->get();
            return view ('pages.settings.terms.list_terms', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.settings.terms.create_terms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $is_api_request = $request->route()->getPrefix()=== 'api';
        if ($is_api_request) {
            $data = [
                'terms_details' => 'required|string|max:255',
                // 'company_id' => 'required|string',
                // 'company_phone' => 'required|string',
                // 'company_address' => 'required|string|max:255',
                'created_by' => 'required|integer',
                
            ];

            $validator = Validator::make($request->all(), $data);
      
           if ($validator->fails()) {
                return ['errors' => $validator->errors()->first()];
            } else {

                $validated = $validator->validated();
                // $validated['status'] = '1';
                $statement = Terms::create($validated);
                return new TermsResource($statement);
            }
        }else {
            $data = [
                'terms_details' => 'required|string|max:255',
                // 'company_id' => 'required|string',
                // 'company_phone' => 'required|string',
                // 'company_address' => 'required|string|max:255',
                
            ];

             $validator = Validator::make($request->all(), $data);
            
            if ($validator->fails()) {
                return ['errors' => $validator->errors()->first()];
            } else {
                $validated = $validator->validated();
                $validated['created_by'] = Auth::user()->id;
                $validated['terms_status'] = 1;
                $statement = Terms::create($validated);
                return ['status' => 'okay'];
            }
        }
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
        $data['data'] = Terms::where('terms_id',$id)->first();
        return view('pages.settings.terms.edit_terms',$data);
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
        $is_api_request = $request->route()->getPrefix()=== 'api';
        if ($is_api_request) {
            $data = [
                'terms_details' => 'required|string|max:255',
                // 'company_id' => 'required|string',
                // 'company_phone' => 'required|string',
                // 'company_address' => 'required|string|max:255',
                'created_by' => 'required|integer',
                
            ];

            $validator = Validator::make($request->all(), $data);
      
           if ($validator->fails()) {
                return ['errors' => $validator->errors()->first()];
            } else {

                $validated = $validator->validated();
                // $validated['status'] = '1';
                $statement = Terms::create($validated);
                return new TermsResource($statement);
            }
        }else {
            Terms::where('terms_id',$request->terms_id)->update([
            'terms_details'=>$request->terms_details,
            'updated_by' => Auth::user()->id,
            'updated_at' => date("Y/m/d"),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Terms::where('terms_id',$id)->update([
            'deleted_by' => Auth::user()->id,
            'terms_status' => 0,
            'is_deleted' => "YES",
        ]);
    }
}