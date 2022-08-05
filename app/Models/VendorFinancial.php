<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorFinancial extends Model
{
    protected $primaryKey = 'vendor_financial_id';

    protected $fillable = [
        'vendor_financial_id',
        'juristic_id',
        'register_capital',
        'account_receivable',
        'current_liabilities',
        'inventory',
        'paid_up_capital',
        'proper_tr_equipment',
        'shareholder_equity',
        'total_asset',
        'total_current_asset',
        'total_liabilities',
        'admin_expenses',
        'cost_of_goods_sold',
        'earning_per_share',
        'income_tax',
        'interest_expenses',
        'net_profit',
        'sale_revenue',
        'total_revenue',
        'statement_year',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/vendor-financials/'.$this->getKey());
    }
}
