<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceISB extends Model
{
    use HasFactory;

    protected $fillable = ['nama_service', 'kategori', 'url_json'];
}
