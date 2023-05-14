<?php

namespace App\Models\Feedback;

use App\Models\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedbackColumns extends General
{
    use HasFactory;

    protected $table = 'feedback_columns';
    public $timestamps = false;


    /*
     * Заглушка. Пока не используется.
     */
    public function additionalFields()
    {
        return $this->hasMany(FeedbackAdditionalFields::class, 'feedback_id', 'feedback_id');
    }
}
