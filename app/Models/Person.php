<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\PersonFactory;
use Illuminate\Database\Eloquent\{Builder, Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Person
 *
 * @property int $id
 * @property string $full_name
 * @property Carbon $birthday
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read int $age
 * @property-read mixed $birthday_with_format
 * @method static PersonFactory factory(...$parameters)
 * @method static Builder|Person newModelQuery()
 * @method static Builder|Person newQuery()
 * @method static Builder|Person onlyTrashed()
 * @method static Builder|Person query()
 * @method static Builder|Person whereBirthday($value)
 * @method static Builder|Person whereCreatedAt($value)
 * @method static Builder|Person whereDeletedAt($value)
 * @method static Builder|Person whereFullName($value)
 * @method static Builder|Person whereId($value)
 * @method static Builder|Person whereUpdatedAt($value)
 * @method static Builder|Person withTrashed()
 * @method static Builder|Person withoutTrashed()
 * @mixin \Eloquent
 */

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'persons';

    protected $guarded = [];

    protected $casts = [
        'birthday' => 'date:d.m.Y',
    ];

    public function getBirthdayWithFormatAttribute(): string
    {
        return $this->birthday->format('d.m.Y');
    }

    /**
     * Получить возраст человека.
     */
    public function getAgeAttribute(): int
    {
        return $this->birthday->age;
    }

}
