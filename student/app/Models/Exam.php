<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Exam extends Model
{
    use SoftDeletes;
    protected $hidden = ['updated_at', 'deleted_at'];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $table = 'exams';

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
        'student_id',
        'term_id',
        'subject_id',
        'mark'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    public function term()
    {
        return $this->hasOne(Term::class, 'id', 'term_id')->select('id', 'name');
    }
    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id')->select('id', 'name');
    }
    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id')->select('id', 'name');
    }
}
