<?php

namespace Tests\DomainsPlans\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\DomainsPlans\DomainsPlansServiceProvider;
use Tests\DomainsPlans\Models\Plan;

class PlanController extends Controller
{
    private string $prefix;

    public function __construct()
    {
        $this->prefix = DomainsPlansServiceProvider::PREFIX_PACKAGE;
    }

    public function index(){
        return view($this->prefix . '::plans.index', [
            'items' => Plan::all(),
            'current_plan' => Auth::user()->plan_id,
        ]);
    }

    public function buyPlan($id){
        User::where('id', Auth::id())
            ->update(['plan_id' => $id]);

        return redirect()->route('tdp.auth.plans.index');
    }

}
