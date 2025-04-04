<?php

namespace Tests\DomainsPlans\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\DomainsPlans\Http\Requests\DomainFormRequest;
use Tests\DomainsPlans\Http\Requests\DomainUpdateRequest;
use Tests\DomainsPlans\Models\Domain;

class DomainController extends Controller
{
    private int $userId;

    public function __construct()
    {
        $this->userId = Auth::id();
    }

    public function addDomain(DomainFormRequest $request){
        $data = $request->validated();

        try{
            Domain::create([
                'user_id' => $this->userId,
                'domain' => $data['domain'],
            ]);

        } catch (UniqueConstraintViolationException $e){
            return redirect()->route('dashboard')->with('error', 'This domain already exists.');
        }

        return redirect()->route('dashboard');
    }

    public function updateDomain(DomainUpdateRequest $request){
        $data = $request->validated();
        try{
            DB::transaction(function () use ($data) {
                if(count($data['removes']))
                    Domain::byAuthUser()
                        ->whereIn('id',$data['removes'])
                        ->delete();

                foreach ($data['domains'] as $id => $domain){
                    Domain::byAuthUser()
                        ->where('id', $id)
                        ->update([
                            'domain' => $domain,
                        ]);
                }
            });
        } catch (UniqueConstraintViolationException $e){
            return redirect()->route('dashboard')->with('error', 'This domain "' . ($domain ?? '') . '" already exists.');
        }

        return redirect()->route('dashboard');
    }

}
