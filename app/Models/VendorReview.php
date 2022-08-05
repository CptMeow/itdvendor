<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorReview extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'vendor_review_id';

    protected $fillable = [
        'vendor_review_id',
        'blacklist_flag',
        'user_id',
        'organization_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/vendor-reviews/'.$this->getKey());
    }
}
