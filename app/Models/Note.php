<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Note extends Model
{
    use HasFactory;

    protected $guarded = false;

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFilter($query)
    {
        $name = request()->input('full_name');
        if (!empty($name)) {
            $query->where('full_name', 'LIKE', '%' . $name . '%');
        }

        $email = request()->input('email');
        if (!empty($email)) {
            $query->where('email', 'LIKE', '%' . $email . '%');
        }

        $phone = request()->input('phone');
        if (!empty($phone)) {
            $query->where('phone', 'LIKE', '%' . $phone . '%');
        }

        return $query;
    }
}
