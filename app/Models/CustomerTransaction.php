<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerTransaction extends Model
{
    //
    protected $table = 'customers_transaction';
    protected $fillable = ['customer_id', 'type', 'amount', 'note', 'created_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
