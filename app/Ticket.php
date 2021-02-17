<?php

namespace App;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = ['title', 'text', 'department', 'file_path', 'priority'];

    protected $attributes = [
        'status' => 0
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityAttribute($value)
    {
        return ['پایین', 'متوسط', 'بالا'][$value];
    }

    public function getStatusAttribute($value)
    {
        return ['باز', 'پاسخ داده شده', 'بسته'][$value];
    }

    public function getCreatedAtAttribute($value)
    {
        $time = new \Verta($value);
        return $time->formatDifference();
    }


}
