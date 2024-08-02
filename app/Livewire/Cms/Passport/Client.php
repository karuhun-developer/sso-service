<?php

namespace App\Livewire\Cms\Passport;

use App\Livewire\Forms\Cms\Passport\FormClient;
use App\Models\Passport\Client as PassportClient;
use BaseComponent;

class Client extends BaseComponent
{
    public FormClient $form;
    public $title = 'Clients';

    public $searchBy = [
            [
                'name' => 'ID',
                'field' => 'id',
            ],
            [
                'name' => 'Name',
                'field' => 'name',
            ],
            [
                'name' => 'Secret',
                'field' => 'secret',
            ],
            [
                'name' => 'Redirect',
                'field' => 'redirect',
            ],
        ],
        $search = '',
        $isUpdate = false,
        $paginate = 10,
        $orderBy = 'name',
        $order = 'asc';

    public function render()
    {
        $get = $this->getDataWithFilter(
            model: new PassportClient,
            searchBy: $this->searchBy,
            orderBy: $this->orderBy,
            order: $this->order,
            paginate: $this->paginate,
            s: $this->search
        );

        if ($this->search != null) {
            $this->resetPage();
        }

        return view('livewire.cms.passport.client', compact('get'))->title($this->title);
    }
}
