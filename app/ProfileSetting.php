<?php

namespace App;

use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;


class ProfileSetting extends Model
{
    use GeneratesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'facebook',
        'rollitup',
        'fourtwentymag',
        'instagram',
        'twitter',
        'snapchat',
        'thcfarmer',
        'strainly',
        'clonify',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => EfficientUuid::class,
        'facebook' => 'boolean',
        'rollitup' => 'boolean',
        'fourtwentymag' => 'boolean',
        'instagram' => 'boolean',
        'twitter' => 'boolean',
        'snapchat' => 'boolean',
        'thcfarmer' => 'boolean',
        'strainly' => 'boolean',
        'clonify' => 'boolean',
    ];
}
