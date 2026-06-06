<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaints';

    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'report_date',
        'issue_title',
        'issue_description',
        'status'
    ];
}