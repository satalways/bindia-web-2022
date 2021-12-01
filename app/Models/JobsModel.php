<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class JobsModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'job_ids';

    protected $dates = [
        'datetime',
        'answered_time',
        'deleted_time',
        'undelete_time',
        'undelete_by',
        'interview_confirmed_time',
        'interview_date',
        'policy_test_confirmed_time',
        'policy_test_time',
        'job_read_time',
        'int_send_date',
        'int_send_email_date',
        'skype_meeting_time'
    ];

    protected $casts = [
        'is_email' => 'boolean'
    ];

    public function answers()
    {
        return $this->hasMany(JobsAnswersModel::class, 'job_number')->orderBy('order');
    }

    public function name()
    {
        if (empty($this->applicant_name)) {
            $name = $this->answers()->where('question', 'like', 'Full Name%')->value('answer') ?? '';
            $this->applicant_name = $name;
            $this->save();

            return $name;
        }

        return $this->applicant_name;
    }

    public function gender()
    {
        return $this->answers()->where('question', 'like', 'Gender%')->value('answer') ?? '';
    }

    public function fields()
    {
        $fields['JOB_ID'] = $this->id;
        $fields['id'] = $this->id;
        $fields['ID'] = $this->id;
        $fields['name'] = $this->name();
        $link = get_admin_link('jobs_new.php') . '?id=' . $this->id;
        $fields['link'] = "<a class='bindia_button' href='" . $link . "'>View Job</a>";

        $fields['jobs_list'] = '';
        foreach ($this->answers as $key => $answer) {
            $fields['jobs_list'] .= '<b>' . ($key + 1) . ') ' . $answer->question . '</b><br>';
            $fields['jobs_list'] .= nl2br($answer->answer) . '<br><br>';
        }

        return $fields;
    }

    public function files()
    {
        $files = Storage::disk('local_main')->allFiles('jobs/' . $this->id);
        $sendFiles = [];
        foreach ($files as $file) {
            $sendFiles[] = storage_path($file);
        }

        return $sendFiles;
    }
}
