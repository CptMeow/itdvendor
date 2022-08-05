<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'tax_no',
        'ref',
        'supplier_name',
        'register_date',
        'capital',
        'tsic',
        'no',
        'transection',
        'account_chart',
        'date',
        'amont',
        'fm_year',
    
    ];
    
    
    protected $dates = [
        'register_date',
        'date',
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/vendors/'.$this->getKey());
    }
}
