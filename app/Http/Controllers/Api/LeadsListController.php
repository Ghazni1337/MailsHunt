<?php

namespace App\Http\Controllers\Api;
 
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LeadsList;

class LeadsListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->getLists());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createList(Request $request)
    {
         $validator = $this->validator($request);

        if ($validator->fails())
        {
            return response()->json(['success'=>false,'errors'=>$validator->errors()->all()], 422);
        }

        LeadsList::create($request->only('name'));
        return response()->json([
            'success' => true, 
            'message' => 'List successfully created',
            'lists'  => $this->getLists()
        ]);
    }

    public function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
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
        $list = LeadsList::find($request->id);
        $list->update($request->only('name'));

        return response()->json(['success'=>true, 'message'=>'List successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = LeadsList::find($id);
        $list->delete();

        return response()->json(['success'=>true, 'message'=>'List successfully deleted']);
    }

    public function getLists()
    {
        return LeadsList::all();
    }

    public function getProspects($id)
    {
        $prospects = LeadsList::find($id)->prospects;
        return response()->json(['success'=>true, 'prospects'=>$prospects]);
    }
}
