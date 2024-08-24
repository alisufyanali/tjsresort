<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'date', 'start_time', 'end_time'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
