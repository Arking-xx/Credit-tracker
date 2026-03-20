<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['customer_name', 'address'];

    public function customerTransactions()
    {
        return $this->hasMany(CustomerTransaction::class);
    }
}
