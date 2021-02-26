<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GalleryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GalleryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Gallery::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/gallery');
        $this->crud->setEntityNameStrings('galerie', 'galerii');
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

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GalleryRequest::class);

        CRUD::field('name')
            ->label('Nume')
            ->type('text')
            ->size(6);

        CRUD::field('category_id')
            ->label('Categorie')
            ->type('select2')
            ->name('category_id')
            ->size(6);

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
}
