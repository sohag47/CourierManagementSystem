<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Address;

class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'branch';
    protected $guarded = [];

    public function addresses()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
