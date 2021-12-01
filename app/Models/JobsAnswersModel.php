<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsAnswersModel extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    public $timestamps = false;

    public function job()
    {
        return $this->belongsTo(JobsModel::class, 'job_number');
    }
}
