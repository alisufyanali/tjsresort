<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Add the fillable property
    protected $fillable = ['date_in', 'date_out', 'time_expected', 'time_out', 'nights', 'truck_number', 'truck_color', 
    'company_name', 'number_of_spaces', 'total_price'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    
}
