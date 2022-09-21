<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procurement extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'procurement_id';

    protected $fillable = [
        'procurement_id',
        'fmis_ref_no',
        'description',
        'purchase_date',
        'chart_of_account_id',
        'amount',
        'fiscal_year',
    
    ];
    
    
    protected $dates = [
        'purchase_date',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/procurements/'.$this->getKey());
    }
}
