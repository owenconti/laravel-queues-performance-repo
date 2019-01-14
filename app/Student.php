<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Student extends Model
{
    public $incrementing = false;

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!isset($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
            }
        });
    }
    
    public function schools()
    {
        return $this->belongsTo(School::class);
    }
}
