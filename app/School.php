<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class School extends Model
{
    protected $with = ['students'];

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

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
