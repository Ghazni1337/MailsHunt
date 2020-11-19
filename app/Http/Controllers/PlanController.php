<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Plans';
        $plans = Plan::all();

        return view('plans.index',compact('title','plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);

        Plan::create($request->all());
        session()->flash('success','Plan successfully added');

        return redirect()->route('plan.all');
    }

    // the new tag indicates whether its a new record for validation 
    // or old record so we either add the unique req to the title or not
    public function validator(Request $request, $new = true)
    {
        $titleRules = $new ? ['required', 'string', 'max:50', 'unique:plans']:['required', 'string', 'max:50'];
        $rules = [
            'title'         => $titleRules,
            'price'         => 'required|integer|not_in:0|min:1',
            'users'         => 'required|integer|not_in:0|min:1',
            'campaigns'     => 'required|integer|not_in:0|min:1',
            'credits'       => 'required|integer|not_in:0|min:1',
            'daily_emails'  => 'required|integer|not_in:0|min:1',
        ];

        $message = [
            'price.not_in'           => 'The price cannot begin with zero',
            'users.not_in'           => 'The users field cannot begin with a zero',
            'campaigns.not_in'       => 'The campaigns field cannot begin with za ero',
            'credits.not_in'         => 'The credits field cannot begin with a zero',
            'daily_emails.not_in'    => 'The daily emails cannot begin with a zero',
            'title.unique'           => 'There\'s a package with this title already',
        ];

        return $this->validate($request, $rules, $message);
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
        $plan = Plan::find($id);
        $title = 'Edit '.$plan->title.' plan';

        return view('plans.edit',compact('title','plan'));
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
        $this->validator($request, false);

        $plan = Plan::find($id);
        $plan->update($request->all());

        session()->flash('success', 'Plan successfully updated');
        return redirect()->route('plan.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $plan = Plan::find($request->planID);
        $plan->delete();
        return response()->json(true);
    }
}
