<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorAddress extends Model
{
    protected $table = 'vendor_address';

    protected $primaryKey = 'vendor_address_id';

    protected $fillable = [
        'vendor_address_id',
        'sequence',
        'address_name',
        'full_address',
        'building',
        'room_no',
        'floor',
        'village_name',
        'address_no',
        'moo',
        'soi',
        'road',
        'tumbol',
        'ampur',
        'province',
        'phone',
        'email',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/vendor-addresses/'.$this->getKey());
    }
}
