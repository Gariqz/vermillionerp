<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FacilityRequest extends Model
{
    protected $table = 'facility_requests';

    protected $fillable = [
        'user_id',
        'nama_barang',
        'link_toko',
        'deskripsi',
        'status',
        'facility_id',
        'request_date',
        'start_datetime',
        'end_datetime',
        'purpose',
        'approved_by',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }
}