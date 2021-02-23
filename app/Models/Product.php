<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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

    protected $with = ['firstMedia'];

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
        return $this->belongsToMany(Category::class)->orderBy('lft');
    }

    public function getProductPrice()
    {
        return $this->pret;
    }

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
            // ->watermark(public_path('/images/test.png'))
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
     * Retrieve the product Title attribute.
     *
     *
     * @param    mixed
     * @param  mixed  $value
     * @return string
     */
    public function getTitleAttribute()
    {
        return preg_replace('/[0-9]+/', '', $this->name);
    }

    /**
     * Retrieve the Display Price attribute.
     *
     *
     * @param    mixed
     * @return string
     */
    public function getDisplayPriceAttribute()
    {
        switch ($this->visible_price) {
            case 'price1':
                return "{$this->price} Lei / {$this->priceType->name}";
            case 'price2':
                return "{$this->price2} Lei / {$this->priceType->name}";
            case 'allprices':
                return [
                    "{$this->price} Lei / {$this->priceType->name}",
                    "{$this->price2} Lei / {$this->priceType->name}",
                ];
            case 'noprice':
                return null;

            default:
                return "{$this->price} Lei / {$this->priceType->name}";
        }
    }

    /**
     * Query scope "Ordered".
     *
     *
     * @param  Illuminate\Database\Query\Builder $query
     * @return Illuminate\Database\Query\Builder
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('lft');
    }

    /**
     * Retrieve the Name And Order attribute.
     *
     * @return string
     */
    public function getNameAndOrderAttribute()
    {
        $categories = $this->categories->pluck('name')->implode(', ');

        return "<span class='badge badge-danger'>$this->lft</span> <strong>$this->name</strong> <span class='float-right badge badge-success'>$categories</span>";
    }

    public function firstMedia(): MorphOne
    {
        return $this->morphOne(config('media-library.media_model'), 'model')
            ->where('collection_name', 'images');
    }

    /**
     * Returneaza prima subcategorie a categoriei parinte.
     */
    protected function subcategories()
    {
        return $this->categories->whereNotNull('parent_id')->limit(1);
    }
}
