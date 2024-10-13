<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ReturnProduct extends Model
{
    use HasFactory;

    protected $table = 'return_products';
    protected $guarded = [];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function checkout()
    {
        return $this->belongsTo(Checkouts::class, 'checkout_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function returnProductProofs()
    {
        return $this->hasMany(ReturnProductProof::class, 'return_product_id');
    }
}
