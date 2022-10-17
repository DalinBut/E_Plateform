<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'phone',
        'email',
        'companyName',
        'position',
        'address',
        'image'
    ];

    public function user(){
        $this -> belongsTo(User::class);
    }
}
