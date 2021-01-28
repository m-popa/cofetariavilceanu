<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix').'/order');
        $this->crud->setEntityNameStrings('comanda', 'comenzi');

        $this->crud->addFields([
            [   // Table
                'name'            => 'detalii',
                'label'           => 'Detalii Comanda',
                'type'            => 'table',
                'entity_singular' => 'mai mult', // used on the "Add X" button
                'columns'         => [
                    'denumire'  => 'Nume produs (ex: Tort)',
                    'forma'  => 'Forma',
                    'cantitate' => 'Cantitate',
                ],
                'max' => 15, // maximum rows allowed in the table
                'min' => 1, // minimum rows allowed in the table
            ],
        ]);

        // Cautare dupa nume
        CRUD::filter('nume')
            ->label('Caută după nume')
            ->type('text')
            ->whenActive(function ($value) {
                $this->crud->addClause('where', 'nume', 'LIKE', "%$value%");
            });

        // Cautare dupa adresa
        CRUD::filter('adresa')
            ->label('Caută după adresă')
            ->type('text')
            ->whenActive(function ($value) {
                $this->crud->addClause('where', 'adresa', 'LIKE', "%$value%");
            });

        // Livrare/Ridicare
        CRUD::filter('livrare')
            ->type('simple')
            ->label('Livrare')
            ->ifActive(function ($value) {
                $this->crud->addClause('where', 'livrare', '1');
            })->else(function ($value) {
                $this->crud->addClause('where', 'livrare', '0');
            });

        // Cautare dupa data (inteval de la - pana la)
        $this->crud->addFilter(
            [
                'type'  => 'date_range',
                'name'  => 'from_to',
                'label' => 'Filtrează după Dată',
            ],
            false,
            function ($value) {
                $dates = json_decode($value);
                $this->crud->addClause('where', 'created_at', '>=', $dates->from);
                $this->crud->addClause('where', 'created_at', '<=', $dates->to.' 23:59:59');
            }
        );
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(OrderRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
