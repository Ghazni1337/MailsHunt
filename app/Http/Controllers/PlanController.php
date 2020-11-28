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

        // $stripe = new \Stripe\StripeClient(
        //   config('app.stripe_secret')
        // );
        // $stripe->products->create([
        //   'name' => 'MailsHunt',
        // ]);

        // dd($stripe->products->all());
        

        return view('plans.index',compact('title','plans'));
    }

    public function getPlansAPI()
    {
        return response()->json(['success'=>true, 'plans'=>Plan::all()]);
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

        //save to stripe dash first
        $stripePlan = $this->saveToStripeDash($request);

        Plan::create( array_merge($request->all(), ['stripe_id' => $stripePlan->id]) );

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
     * Save the plan on the stripe dashboard
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveToStripeDash(Request $request)
    {
        $stripe = new \Stripe\StripeClient(
          config('app.stripe_secret')
        );

        //save product
        $plan = $stripe->plans->create([
          'amount' => $request->price,
          'currency' => 'usd',
          'interval' => 'month',
          'nickname' => $request->title,
          'product' => 'prod_ISfQlX3XlkZLqg',
          'metadata'    => [
                            'users'         => $request->users,
                            'campaigns'     => $request->campaigns,
                            'credits'       => $request->credits,
                            'daily_emails'  => $request->daily_emails
                            ]
        ]);

        return $plan;
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

        //since stripe plans are immutable
        //first delete the plan from the stripe dashboard
        $stripe = new \Stripe\StripeClient(
          config('app.stripe_secret')
        );

        $stripe->plans->delete(
          $request->id,
          []
        );

        //create another plan with the same ID
        $plan = $stripe->plans->create([
          'id'          => $request->id,
          'amount'      => $request->price,
          'currency'    => 'usd',
          'interval'    => 'month',
          'nickname'    => $request->title,
          'product'     => 'prod_ISfQlX3XlkZLqg',
          'metadata'    => [
                            'users'         => $request->users,
                            'campaigns'     => $request->campaigns,
                            'credits'       => $request->credits,
                            'daily_emails'  => $request->daily_emails
                            ]
        ]);

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
        //delete plan from stripe dash
        $stripe = new \Stripe\StripeClient(
          config('app.stripe_secret')
        );

        $stripe->plans->delete(
          $request->planID,
          []
        );

        $plan = Plan::find($request->planID);
        $plan->delete();
        return response()->json(true);
    }
}
