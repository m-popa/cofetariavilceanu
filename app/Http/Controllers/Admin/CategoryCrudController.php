<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

    public function setup()
    {
        $this->crud->setModel(Category::class);
        $this->crud->enableReorder('name', 3);
        $this->crud->setRoute(config('backpack.base.route_prefix').'/categories');
        $this->crud->setEntityNameStrings('categorie', 'categorii');
    }

    /**
     * Fetch the category parent
     *
     * @return \Illuminate\Http\JsonResponse|Illuminate\Database\Eloquent\Collection|Illuminate\Pagination\LengthAwarePaginator
     */
    public function fetchParent()
    {
        return $this->fetch([
            'model'                 => Category::class,
            'searchable_attributes' => ['name'],
            'paginate'              => 10,
        ]);
    }

    protected function setupListOperation()
    {
        CRUD::column('name')
            ->label('Nume')
            ->type('text');

        CRUD::column('parent')
            ->label('Categorie părinte')
            ->type('relationship')
            ->wrapper([
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('categories/'.$related_key.'/show');
                },
            ]);

        CRUD::column('products')
            ->label('# Produse')
            ->type('relationship_count')
            ->suffix('')
            ->orderable(true)
            ->orderLogic(function ($query, $column, $columnDirection) {
                return $query->withCount('products')
                    ->orderBy('products_count', $columnDirection);
            })
            ->wrapper(['class' => 'font-weight-bold']);
    }

    protected function setupCreateOperation()
    {
        CRUD::field('name')
            ->label('Titlu')
            ->type('text')
            ->size(6);

        CRUD::field('parent_id')
            ->label('Categoria Părinte')
            ->type('relationship')
            ->attribute('name')
            ->size(6);

        CRUD::field('orientation')
            ->label('Orientarea produselor din categorie')
            ->type('select_from_array')
            ->hint('defaultul este pe "Pătrat"')
            ->options(['1' => 'Pătrat', '2' => 'Înalt'])
            ->size(6);

        CRUD::field('homepage')
            ->label('Arată produsele din categorie pe homepage')
            ->hint('doar 4 produse vor fi afisate')
            ->type('select_from_array')
            ->options(['0' => 'NU', '1' => 'DA'])
            ->size(6);

        CRUD::field('visible_in_nav')
            ->label('Apare in meniu')
            ->type('select_from_array')
            ->options(['0' => 'NU', '1' => 'DA'])
            ->default(1)
            ->size(6);

        CRUD::field('disable_description')
            ->label('Ascunde descrierea pentru categoriile cu poze inalte')
            ->hint('pentru torturi nunta?')
            ->type('select_from_array')
            ->default('0')
            ->options(['0' => 'NU', '1' => 'DA'])
            ->size(6);

        // CRUD::field('description')
        //     ->label('Descriere')
        //     ->type('easymde')
        //     ->simplemdeAttributes([
        //         'promptURLs'   => true,
        //         'status'       => false,
        //         'spellChecker' => false,
        //         'forceSync'    => true,
        //         'styleSelectedText' => false,
        //     ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
