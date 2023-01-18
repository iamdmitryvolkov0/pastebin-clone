<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PasteStatusEnum;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id Идентификатор модели
 * @property string $title Заголовок
 * @property string $body Описание
 * @property int $status Статус пасты
 */
class Paste extends Model
{
    use HasFactory;

    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    protected $casts = [
        'status' => PasteStatusEnum::class,
    ];

    protected $fillable = ['title', 'body', 'status', 'user_id'];

}
