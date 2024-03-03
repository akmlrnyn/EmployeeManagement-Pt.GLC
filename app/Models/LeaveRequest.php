<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable= ['employee_id','status','category', 'amount_of_days', 'reason'];

    /**
     * Get the employee that owns the LeaveRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    /**
     * Get the name associated with the LeaveRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

}
