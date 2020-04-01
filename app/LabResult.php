<?php

namespace App;

use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;


class LabResult extends Model
{
    use GeneratesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'laboratory_id',
        'lab_result_type',
        'lab_result_id',
        'result',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => EfficientUuid::class,
        'laboratory_id' => 'integer',
        'lab_result_id' => 'integer',
        'result' => 'array',
    ];


    public function laboratory()
    {
        return $this->belongsTo(\App\Laboratory::class);
    }
}
