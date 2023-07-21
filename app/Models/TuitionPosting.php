<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TuitionPosting extends Model
{
    /**
     * Get the tutor who posted the tuition.
     */
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    /**
     * Get the category of the tuition posting.
     */
    // public function category()
    // {
    //     // Assuming you have a 'category_id' foreign key in the tuition_postings table
    //     return $this->belongsTo(Category::class, 'category_id');
    // }

    /**
     * Get the students enrolled in the tuition posting.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject',
        'tuition_fee',
        'max_students',
        'tutor_id',
    ];

    // Rest of the model code...
}
