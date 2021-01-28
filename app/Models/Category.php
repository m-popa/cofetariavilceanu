<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CrudTrait;

    protected $table = 'categories';

    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
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
        return route('categories', ['slug' => $category->parent()->first()->slug]);
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
     * Genereaza o colectie de subcategorii in functie de parintele categoriei
     * si le sorteaza dupa lft (left) extragand doar campurile
     * nume, slug, lft categorii -- de folosit
     * pe pagina categoriei principale.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function subcategories()
    {
        return self::select('name', 'slug', 'lft')->where('parent_id', $this->id)->get()->sortBy('lft');
    }

    /**
     * Relatie children spre categorie.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
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
        return route('category', [$this]);
    }

    /**
     * Retrieve the Name attribute.
     *
     *
     * @param    mixed
     * @param  mixed  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return $this->isParent() ? $value.' (P) ' : $value;
    }
}
