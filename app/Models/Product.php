<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'type',
        'img_path',
        'product_explanation',
        'user_id'
    ];

    //1対多のリレーション追加
    public function user() {
        return $this->belongsTo(User::class);
    }
}
