<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Tag;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function category()
            {
                return $this->belongsTo(Category::class);
            }

    public function tags()
        {
            return $this->belongsToMany(Tag::class);
        }

    public function getGenderLabelAttribute(): string
    {
        return match ((int)$this->gender) {
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        };
    }
}
