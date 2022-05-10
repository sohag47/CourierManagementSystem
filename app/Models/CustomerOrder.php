<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customer;
use App\Models\User;

class CustomerOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'customer_order';
    protected $guarded = [];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function senderBranches()
    {
        return $this->belongsTo(Branch::class, 'sender_branch_id');
    }
    public function recipientBranch()
    {
        return $this->belongsTo(Branch::class, 'recipient_branch_id');
    }
    public function sender_deliveryman()
    {
        return $this->belongsTo(Branch::class, 'sender_deliveryman_id');
    }
    public function recipient_deliveryman()
    {
        return $this->belongsTo(Branch::class, 'recipient_deliveryman_id');
    }
    
}
