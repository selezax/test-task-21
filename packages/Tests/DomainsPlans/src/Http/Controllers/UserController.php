<?php

namespace Tests\DomainsPlans\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\DomainsPlans\DomainsPlansServiceProvider;
use Tests\DomainsPlans\Models\Plan;

class UserController extends Controller
{
    private string $prefix;

    public function __construct()
    {
        $this->prefix = DomainsPlansServiceProvider::PREFIX_PACKAGE;
    }

    public function index(){
        return view($this->prefix . '::users.index', [
            'items' => User::with(['domains'])
                            ->orderBy('created_at', 'desc')->paginate(20)
        ]);
    }

}
