<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $phone
 * @property bool $favorite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereFavorite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereUserId($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'phone', 'favorite'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'favorite'  => 'boolean'
    ];
}
