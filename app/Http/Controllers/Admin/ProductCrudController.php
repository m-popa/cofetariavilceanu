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

    public function setup()
    {
        $this->crud->setModel(Product::class);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/product');
        $this->crud->setEntityNameStrings('produs', 'produse');
        // $this->crud->setEditView('your-view');
        // $this->crud->setCreateView('admin.product.create');

        $this->crud->enableExportButtons();
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
                return $entry->price.' / '.$entry->price_type_display;
            })
            ->wrapper(['class' => 'font-weight-bold']);

        CRUD::column('sku')
            ->label('SKU')
            ->type('text');
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
            ->size(2);

        CRUD::field('price_type')
            ->label('Tip Preț')
            ->type('select2_from_array')
            ->size(2)
            ->options([
                1 => 'Bucată',
                2 => 'Kg',
                3 => '100g',
            ]);

        CRUD::field('categories')
            ->label('Categorii')
            ->type('relationship')
            ->minimum_input_length(3)
            ->hint('Produsul poate avea mai multe categorii, dar doar cele parinte vor fii categoria principala.')
            ->size(4);

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

        CRUD::column('price_type')
            ->label('Tip Preț')
            ->type('closure')
            ->function(function ($entry) {
                return $entry->price_type_display;
            })
            ->after('price');
    }
}
