<?php

namespace App\Models;

use App\Exceptions\InvalidParamsException;
use App\Exceptions\NotFoundException;
use App\Http\Requests\Notebook\StoreRequest;
use App\Http\Requests\Notebook\UpdateRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


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
