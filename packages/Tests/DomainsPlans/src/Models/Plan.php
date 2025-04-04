<?php

namespace Tests\DomainsPlans\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tests\DomainsPlans\Models\Factories\PlanFactory;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plans';

    protected $fillable = [
        'plan_name',
        'price',
        'features',
    ];

    protected $appends = [
        'price_formatted',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function getPriceFormattedAttribute(){
        return number_format($this->attributes['price'], 2, '.', ' ');
    }

    protected static function newFactory()
    {
        return PlanFactory::new();
    }
}
