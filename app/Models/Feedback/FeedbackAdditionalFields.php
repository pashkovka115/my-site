<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackAdditionalFields extends Model
{
    use HasFactory;

    protected $table = 'feedback_additional_fields';
    public $timestamps = false;
    protected $fillable = [
        'feedback_id',
        'key',
        'name',
        'type',
        'value',
        'is_show',
    ];
}
