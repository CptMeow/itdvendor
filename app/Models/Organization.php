<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    
    protected $primaryKey = 'organization_id';

    protected $fillable = [
        'organization_id',
        'organization_code',
        'organization_name',
        'organization_parent',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/organizations/'.$this->getKey());
    }
}
