<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Models\NewsCategories
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsCategories extends Model
{
    public function news(){
        return $this->hasMany(News::class);
    }
}
