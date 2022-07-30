<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use SoftDeletes;
    protected $hidden = ['updated_at', 'deleted_at'];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    protected $fillable = [
        'name',
        'age',
        'gender',
        'teacher_id',
        'email'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }
}
