<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
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

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function productViews()
    {
        return $this->hasMany(ProductViews::class);
    }

    public function bannerSettings()
    {
        return $this->hasMany(BannerSettings::class);
    }
}
