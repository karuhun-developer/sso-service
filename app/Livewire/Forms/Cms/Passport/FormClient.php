<?php

namespace App\Livewire\Forms\Cms\Passport;

use App\Livewire\Contracts\FormCrudInterface;
use App\Models\Passport\Client;
use Laravel\Passport\ClientRepository;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormClient extends Form implements FormCrudInterface
{
    #[Validate('nullable|numeric')]
    public $id;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $redirect;

    // Get the data
    public function getDetail($id) {
        $data = Client::find($id);

        $this->id = $id;
        $this->name = $data->name;
        $this->redirect = $data->redirect;
    }

    // Save the data
    public function save() {
        $this->validate();

        if ($this->id) {
            $this->update();
        } else {
            $this->store();
        }

        $this->reset();
    }

    // Store data
    public function store() {
        $clientRepo = new ClientRepository;
        $clientRepo->create(auth()->user()->id, $this->name, $this->redirect);
    }

    // Update data
    public function update() {
        $clientRepo = new ClientRepository;
        $clientRepo->update($this->id, $this->name, $this->redirect);
    }

    // Delete data
    public function delete($id) {
        Client::find($id)->delete();
    }
}
