<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';

    protected $with = ['categories'];

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Query scope "Variations".
     *
     * @param  Illuminate\Database\Query\Builder $query
     * @param  mixed                             $value
     * @return Illuminate\Database\Query\Builder
     */
    public function scopeVariations($query)
    {
        return $query->orWhere('child_of', '=', $this->child_of);
    }

    public function getProductPrice()
    {
        return $this->pret;
    }

    /**
     * Query scope "Parent".
     *
     * @param  Illuminate\Database\Query\Builder $query
     * @param  mixed                             $value
     * @return Illuminate\Database\Query\Builder
     */
    public function scopeParent($query)
    {
        return $query->where('id', '=', $this->child_of);
    }

    /**
     * Retrieve the Price Type attribute.
     *
     *
     * @param    mixed
     * @param  mixed  $value
     * @return string
     */
    public function getPriceTypeDisplayAttribute()
    {
        if (!$this->price_type) {
            return 'Necunoscut';
        }

        switch ($this->price_type) {
            case 1:
                return 'bucata';

            case 2:
                return 'Kg';

            case 3:
                return '100g';

            default:
                return 'Nespecificat';
        }
    }

    /**
     * Returneaza categoria parinte a produsului.
     */
    protected function category()
    {
        return $this->categories->whereNull('parent_id');
    }

    /**
     * Returneaza prima subcategorie a categoriei parinte.
     */
    protected function subcategories()
    {
        return $this->categories->whereNotNull('parent_id')->limit(1);
    }
}
