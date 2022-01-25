<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InvitationRequest;
use App\Models\Seating;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InvitationCrudController
 *
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InvitationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Invitation::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/invitation');
        CRUD::setEntityNameStrings('invitation', 'invitations');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addButtonFromView('line', 'send-wa-invite', 'wa-invite', true);

        CRUD::column('guest_code');
        CRUD::column('name');
        CRUD::column('phone');
        CRUD::column('guests')->label('Guest(s)');
        CRUD::column('seating')->type('relationship');
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
        CRUD::setValidation(InvitationRequest::class);
        CRUD::field('guest_code');
        CRUD::field('name');
        CRUD::field('phone')
            ->prefix('+62')
            ->attributes([
                'type' => 'tel',
            ]);
        CRUD::field('guests')
            ->label('Guest(s)')
            ->attributes([
                'min' => 1,
                'max' => 6,
            ])
            ->default(1)
            ->type('number')
            ->suffix('person(s)');
        CRUD::field('seating_id')
            ->label('Seating')
            ->type('select2')
            ->entity('seating')
            ->model(Seating::class)
            ->attribute('name')
            ->allowsNull(true);
        CRUD::field('files')
            ->label('Files')
            ->type('browse');
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
