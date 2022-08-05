<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorComittee extends Model
{
    protected $primaryKey = 'vendor_commitee_id';

    protected $fillable = [
        'vendor_commitee_id',
        'sequence',
        'first_name',
        'last_name',
        'title',
        'type',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/vendor-comittees/'.$this->getKey());
    }
}
