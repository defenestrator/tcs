<?php

namespace App;

use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use GeneratesUuid;

    use GeneratesUuid;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'title',
        'body',
        'slug',
        'published_at',
        'contentable_type',
        'contentable_id',
        'custom_fields',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => EfficientUuid::class,
        'uuid' => EfficientUuid::class,
        'user_id' => 'integer',
        'contentable_id' => 'integer',
        'custom_fields' => 'array',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
