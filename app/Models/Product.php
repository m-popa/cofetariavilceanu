<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use Sluggable;
    use CrudTrait;
    use InteractsWithMedia;

    protected $table = 'products';

    protected $with = ['categories'];

    protected $guarded = ['id'];

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

    public function categories()
    {
        return $this->belongsToMany(Category::class);
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
    // public function getPriceTypeDisplayAttribute()
    // {
    //     if (!$this->price_type) {
    //         return 'Necunoscut';
    //     }

    //     switch ($this->price_type) {
    //         case 1:
    //             return 'bucata';

    //         case 2:
    //             return 'Kg';

    //         case 3:
    //             return '100g';

    //         default:
    //             return 'Nespecificat';
    //     }
    // }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();

        $this
            ->addMediaConversion('modal_images')
            ->width(1200)
            ->height(700)
            ->queued();

        $this
            ->addMediaConversion('home_images')
            ->width(780)
            ->height(500)
            ->queued();
    }

    /**
     * Relationship with the PriceType model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priceType()
    {
        return $this->belongsTo(PriceType::class, 'price_type', 'id')->withDefault();
    }

    /**
     * Retrieve the ParentCategory attribute.
     *
     *
     * @param    mixed
     * @param  mixed  $value
     * @return string
     */
    public function getParentCategoryAttribute()
    {
        return $this->categories->whereNull('parent_id')->first();
    }

    /**
     * Retrieve Orientation attribute.
     *
     *
     * @param    mixed
     * @param  mixed  $value
     * @return string
     */
    public function getOrientationAttribute()
    {
        return $this->categories->orientation;
    }

    /**
     * Returneaza prima subcategorie a categoriei parinte.
     */
    protected function subcategories()
    {
        return $this->categories->whereNotNull('parent_id')->limit(1);
    }
}
