<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CrudTrait;
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'categories';

    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Returneaza parintele categoriei cerute.
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Returneaza categoriile parinte.
     */
    public function getParentCategories()
    {
        return self::whereNull('parent_id')->get();
    }

    /**
     * Returneaza link spre categoria parinte a categoriei cerute.
     */
    public function parentCategoryLink()
    {
        return route('categories.index', ['slug' => $category->parent()->first()->slug]);
    }

    /**
     * Daca e categorie parinte returneaza true, altfel returneaza false.
     *
     * @return bool
     */
    public function isParent()
    {
        if ($this->parent_id == null) {
            return true;
        }

        return false;
    }

    /**
     * Relatie children spre categorie.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->whereNotNull('parent_id')->where('parent_id', $this->id);
    }

    /**
     * Retrieve the Url attribute.
     *
     * @param    mixed
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('categories.index', [$this]);
    }

    /**
     * Retrieve the Name attribute.
     *
     *
     * @param    mixed
     * @param  mixed  $value
     * @return string
     */
    public function getDisplayNameAttribute($value)
    {
        return $this->isParent() ? $value.' (P) ' : $value;
    }

    /**
     * Retrieve the Title attribute.
     */
    public function getTitleAttribute()
    {
        return str_replace('homepage', '', $this->name);
    }

    /**
     * Returneaza prima subcategorie a categoriei parinte.
     */
    protected function subcategories()
    {
        return $this->categories->whereNotNull('parent_id')->limit(1);
    }
}
