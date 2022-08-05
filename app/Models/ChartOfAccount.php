<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    
    protected $primaryKey = 'chart_of_account_id';

    protected $fillable = [
        'chart_of_account_id',
        'account_code',
        'account_name',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/chart-of-accounts/'.$this->getKey());
    }
}
