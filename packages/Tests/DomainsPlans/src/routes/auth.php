<?php

use Illuminate\Support\Facades\Route;

Route::post('add-domain')
    ->name('domain.add')
    ->uses('DomainController@addDomain');

Route::post('edit-domains')
    ->name('domain.update')
    ->uses('DomainController@updateDomain');


Route::get('plans')
    ->name('plans.index')
    ->uses('PlanController@index');

Route::get('buy-plan/{plan_id}')
    ->name('plans.buy')
    ->uses('PlanController@buyPlan');

Route::get('users')
    ->name('users.index')
    ->uses('UserController@index')
    ->middleware('admin');

