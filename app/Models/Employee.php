<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function timeOffRequests()
    {
        return $this->hasMany(TimeOffRequest::class);
    }

    public function workingHours()
    {
        return $this->hasMany(WorkingHour::class);
    }

    public function scheduledDays()
    {
        return $this->hasMany(ScheduledDay::class);
    }

    public function pays()
    {
        return $this->hasMany(Pay::class);
    }
}
