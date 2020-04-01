<?php

namespace App;

use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use GeneratesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'strain_id',
        'category_id',
        'name',
        'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => EfficientUuid::class,
        'strain_id' => 'integer',
        'category_id' => 'integer',
        'price' => 'integer',
    ];


    public function strain()
    {
        return $this->belongsTo(\App\Strain::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }
}
