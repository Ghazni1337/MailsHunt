<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LeadsListProspect;
use App\Prospect;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['success'=>true, 'prospects'=>Prospect::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prospect = Prospect::find($id);
        return response()->json(['success'=>true, 'prospect'=>$prospect]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request);

        if ($validator->fails())
        {
            return response()->json(['success'=>false,'errors'=>$validator->errors()->all()], 422);
        }

        $prospect = new Prospect();
        $prospect->name = $request->name;
        $prospect->company_name = !empty($request->company_name)?$request->company_name:null;

        $prospect->save();

        //add to a list using pivot table
        $this->saveToList($request->list_id, $prospect->id);

        return response()->json(['success' =>true, 'message' => 'Prospect saved to list']);
    }

    public function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
    }

    public function saveToList($list_id, $prospect_id)
    {
        $listInfo = new LeadsListProspect;

        $listInfo->list_id = $list_id;
        $listInfo->prospect_id = $prospect_id;

        $listInfo->save();
        return true;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $prospect = Prospect::find($request->id);
        $prospect->update($request->only('name','company_name'));

        return response()->json(['success'=>true, 'message'=>'prospect info successfully updated','prospect'=>$prospect]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prospect = Prospect::find($id);
        $prospect->delete();

        return response()->json(['success'=>true, 'message'=>'Prospect successfully deleted']);
    }
}
