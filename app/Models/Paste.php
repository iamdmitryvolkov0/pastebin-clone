<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PasteStatusEnum;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id Идентификатор модели
 * @property string $title Заголовок
 * @property string $body Описание
 * @property int $status Статус пасты
 * @property Carbon $created_at Время создания
 * @property Carbon $delete_at Окончание жизни пасты
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

    protected $fillable = ['title', 'body', 'status', 'user_id', 'hash_link','hide_in'];

    protected $hidden = ['hash_link'];

    public function getRouteKeyName()
    {
        return 'hash_link';
    }
}
