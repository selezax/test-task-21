<?php

namespace Tests\DomainsPlans\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Tests\DomainsPlans\Models\Factories\DomainFactory;

class Domain extends Model
{
    use HasFactory;

    protected $table = 'domains';

    protected $fillable = [
        'user_id',
        'domain',
    ];

    public function setDomainAttribute($value)
    {
        preg_match('/^(?:https?:\/\/)?(?:www\.)?([a-zA-Z0-9-]+\.[a-zA-Z0-9-]+)(?:\/.*)?$/', $value, $matches);
        $host = $matches[1] ?? null;
        $this->attributes['domain'] = $host;
    }

    public function scopeByAuthUser($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

    protected static function newFactory()
    {
        return DomainFactory::new();
    }
}
