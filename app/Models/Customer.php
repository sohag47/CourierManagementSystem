<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CustomerOrder;
use App\Models\Branch;
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'customer';
    protected $guarded = [];
    public function customerOrders()
    {
        return $this->hasOne(CustomerOrder::class, 'customer_id');
    }
    
}
