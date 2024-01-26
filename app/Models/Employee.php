<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'email', 'leave_request_left'
    ];

    
    /**
     * Get the user that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the salary_slip for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salary_slip(): HasMany
    {
        return $this->hasMany(SalarySlip::class, 'employee_id', 'id');
    }

    /**
     * Get all of the leave_request for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leave_request(): HasMany
    {
        return $this->hasMany(LeaveRequest::class, 'employee_id', 'id');
    }

}
