<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackDB extends Model
{
    use HasFactory;

    protected $table = 'requested_feedback_db';

    public function getQuestionTypeNameAttribute()
    {
        switch ($this->question_type) {
            case '1':
                return 'Rating';
            case '2':
                return 'YesNo';
            case '3':
                return 'TextArea';
            case '4':
                return 'File';
            case '5':
                return 'ShopsList';
            default:
                return '';
        }
    }
}
