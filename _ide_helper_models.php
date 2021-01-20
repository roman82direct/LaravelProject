<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Http\Models{
/**
 * App\Http\Models\News
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property int|null $source_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $text
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News find($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Http\Models\NewsCategories $newsCategories
 */
	class News extends \Eloquent {}
}

namespace App\Http\Models{
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
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories find()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsCategories whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Models\News[] $news
 * @property-read int|null $news_count
 */
	class NewsCategories extends \Eloquent {}
}

namespace App\Http\Models{
/**
 * App\Http\Models\Source
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Source newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Source newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Source query()
 * @method static \Illuminate\Database\Eloquent\Builder|Source find()
 * @method static \Illuminate\Database\Eloquent\Builder|Source fill()
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Source extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

