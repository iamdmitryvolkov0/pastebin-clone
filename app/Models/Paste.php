<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PasteStatusEnum;

/**
 * @property int $id Идентификатор модели
 * @property string $title Заголовок
 * @property string $body Описание
 * @property int $status Статус пасты
 */
class Paste extends Model
{
    protected $table = 'Pastes';

    use HasFactory;

    protected $casts = [
        'status' => PasteStatusEnum::class,  //преобразователь свойств - читай мутаторы
    ];

    protected $fillable = ['title', 'body', 'status'];

}
