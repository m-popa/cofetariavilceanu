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
            ->label('Părinte')
            ->type('relationship')
            ->attribute('name')
            ->size(5);

        CRUD::field('description')
            ->label('Descriere')
            ->type('easymde')
            ->simplemdeAttributes([
                'promptURLs'   => true,
                'status'       => false,
                'spellChecker' => false,
                'forceSync'    => true,
                'styleSelectedText' => false,
            ]);
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
