<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LnkProductCategory
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $products_id
 * @property int $categories_id
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|LnkProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LnkProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LnkProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|LnkProductCategory whereCategoriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LnkProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LnkProductCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LnkProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LnkProductCategory whereProductsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LnkProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LnkProductCategory extends Model
{
    use HasFactory;

    protected $table = 'lnk_products_categories';
}
