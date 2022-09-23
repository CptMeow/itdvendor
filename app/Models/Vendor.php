<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

/**
 * @property int    $vendor_id
 * @property int    $sub_district_id
 * @property int    $district_id
 * @property int    $province_id
 * @property string $juristic_id
 * @property string $juristic_type
 * @property string $juristic_name_th
 * @property string $juristic_name_en
 * @property string $juristic_status
 * @property string $standard_id
 * @property string $address
 * @property string $postal_code
 * @property string $juristic_phone
 * @property string $mobile_number
 * @property string $fex_number
 * @property string $juristic_website
 * @property string $facebook_url
 * @property string $line_id
 * @property string $juristic_email
 * @property Date   $register_date
 */
class Vendor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vendors';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'vendor_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'juristic_id', 'juristic_type', 'juristic_name_th', 'juristic_name_en', 'juristic_status', 'standard_id', 'register_date', 'register_capital', 'address', 'sub_district_id', 'district_id', 'province_id', 'postal_code', 'juristic_phone', 'mobile_number', 'fex_number', 'juristic_website', 'facebook_url', 'line_id', 'juristic_email', 'paid_register_capital', 'blacklist_flag'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'vendor_id' => 'int', 'juristic_id' => 'string', 'juristic_type' => 'string', 'juristic_name_th' => 'string', 'juristic_name_en' => 'string', 'juristic_status' => 'string', 'standard_id' => 'string', 'register_date' => 'date', 'address' => 'string', 'sub_district_id' => 'int', 'district_id' => 'int', 'province_id' => 'int', 'postal_code' => 'string', 'juristic_phone' => 'string', 'mobile_number' => 'string', 'fex_number' => 'string', 'juristic_website' => 'string', 'facebook_url' => 'string', 'line_id' => 'string', 'juristic_email' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'register_date'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
    public function getHashids()
    {
        return Hashids::encode($this->getKey());
    }
}
