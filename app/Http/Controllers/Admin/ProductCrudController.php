<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

    public function setup()
    {
        $this->crud->setModel(Product::class);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/product');
        $this->crud->setEntityNameStrings('produs', 'produse');

        $this->crud->enableExportButtons();
        $this->crud->enableReorder('name_and_order', 2);
        $this->crud->allowAccess('reorder');
        // dropdown filter
        $this->crud->addFilter([
            'name' => 'active',
            'type' => 'dropdown',
            'label'=> 'Status',
        ], [
            true => 'Activ',
            false => 'Inactiv',

        ], function ($value) { // if the filter is active
            $this->crud->addClause('where', 'active', $value);
        });

        CRUD::filter('categories')
            ->label('Categorie')
            ->type('select2_multiple')
            ->values(function () {
                return Category::all()->pluck('name', 'id')->toArray();
            })
            ->whenActive(function ($values) {
                foreach (json_decode($values) as $key => $value) {
                    $this->crud->query = $this->crud->query->whereHas('categories', function ($query) use ($value) {
                        $value = (int) $value;
                        $query->where('category_id', $value);
                    });
                }
            });
    }

    /**
     * Fetch Categories over ajax
     *
     * @return \Illuminate\Http\JsonResponse|Illuminate\Database\Eloquent\Collection|Illuminate\Pagination\LengthAwarePaginator
     */
    public function fetchCategory()
    {
        return $this->fetch([
            'model'                 => Category::class,
            'searchable_attributes' => ['nume'],
            'paginate'              => 10,
        ]);
    }

    public function store()
    {
        $response = $this->traitStore();

        $this->attachMediaFromRequest();

        return $response;
    }

    public function update()
    {
        $response = $this->traitUpdate();

        $this->attachMediaFromRequest();

        return $response;
    }

    protected function attachMediaFromRequest()
    {
        $this->crud->entry
            ->syncFromMediaLibraryRequest(request('images'))
            ->toMediaCollection('images');
    }

    protected function setupListOperation()
    {
        CRUD::column('name')
            ->label('Nume')
            ->type('text');

        CRUD::column('categories')
            ->label('Categorii produs')
            ->type('relationship')
            ->attribute('name')
            ->wrapper([
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('categories/'.$related_key.'/show');
                },
            ]);

        CRUD::column('price')
            ->label('Preț')
            ->type('closure')
            ->function(function ($entry) {
                return $entry->price.' / '.$entry->priceType->name;
            })
            ->wrapper(['class' => 'font-weight-bold']);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProductRequest::class);

        CRUD::field('name')
            ->label('Nume')
            ->type('text')
            ->size(4);

        CRUD::field('price')
            ->label('Preț')
            ->type('number')
            ->decimals(2)
            ->attributes([
                'step' => 'any',
            ])
            ->suffix(' RON')
            ->size(3);

        CRUD::field('price2')
            ->label('Preț 2')
            ->type('number')
            ->decimals(2)
            ->attributes([
                'step' => 'any',
            ])
            ->suffix(' RON')
            ->size(3);

        CRUD::field('priceType')
            ->label('TIP PREȚ')
            ->type('relationship')
            ->attribute('name')
            ->entity('priceType')
            ->ajax(true)
            ->minimum_input_length(0)
            ->placeholder('Caută tip preț')
            ->inline_create(['entity' => 'admin.price-type'])
            ->size(2);

        CRUD::field('categories')
            ->label('Categorii')
            ->type('relationship')
            ->minimum_input_length(3)
            ->hint('Produsul poate avea mai multe categorii, dar doar cele parinte vor fii categoria principala.')
            ->size(6);

        CRUD::field('visible_price')
            ->label('Afisare pret')
            ->type('select2_from_array')
            ->options([
                'price1' => 'Afiseaza pret 1',
                'price2' => 'Afiseaza pret 2',
                'allprices' => 'Afiseaza ambele preturi',
                'noprice' => 'Ascunde ambele preturi',
            ])
            ->default('price1')
            ->size(6);

        CRUD::field('sku')
            ->label('Cod produs')
            ->type('text')
            ->size(12);

        CRUD::field('intro')
            ->label('Descriere scurta')
            ->type('textarea')
            ->size(12);

        CRUD::field('description')
            ->label('Descriere')
            ->type('tinymce')
            ->options([
                'min_height' => 350,
                'branding' => false,
                'skin' => 'oxide',
            ])
            ->size(12);

        CRUD::field('medialibrary')
            ->label('Adaugă poze')
            ->type('medialibrary')
            ->size(12);

        CRUD::field('button_text')
            ->label('Text buton (default: Vezi Produsul)')
            ->default('Vezi Produsul')
            ->type('text')
            ->size(12);

        CRUD::field('randomHiddenName')
            ->type('upload_multiple')
            ->upload(true)
            ->wrapper([
                'class' => 'd-none',
            ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();

        CRUD::column('priceType')
            ->label('TIP PREȚ')
            ->type('relationship')
            ->attribute('name')
            ->after('price');
    }

    protected function fetchPriceType()
    {
        return $this->fetch(\App\Models\PriceType::class);
    }
}
