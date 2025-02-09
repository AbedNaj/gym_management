<?php

namespace App\Livewire;

use App\Models\Customer;
use Illuminate\Support\Facades\Session;

use Livewire\Component;

class CustomerSearch extends Component
{
    public $query = '';
    public $customers = [];

    public $highlightindex = 0;

    public function fresh()
    {


        $this->customers = [];
        $this->query = '';
        $this->highlightindex = 0;
    }

    public function decrementHighLight()
    {
        if ($this->highlightindex === 0) {
            $this->highlightindex = Count($this->customers) - 1;
            return;
        }
        $this->highlightindex--;
    }
    public function incrementHighLight()
    {
        if ($this->highlightindex === count($this->customers) - 1) {
            $this->highlightindex = 0;
            return;
        }
        $this->highlightindex++;
    }
    public function setHighlightIndex($index)
    {
        $this->highlightindex = $index;
    }

    public function selectCustomerByIndex($index)
    {
        if (isset($this->customers[$index])) {
            $customer = $this->customers[$index];
            $this->query = $customer['name'] ?? 'Unnamed customer';
            $this->redirect(route('admin.registration.show', $customer['id']));
        }
    }
    public function updatedQuery()
    {


        $this->customers = Customer::where('name', 'like', '%' . $this->query . '%')
            ->where('gym_id', '=',  Session::get('gym_id'))
            ->get()
            ->toArray();
    }
    public function selectCustomer()
    {
        if (!empty($this->customers)) {
            $customer = $this->customers[$this->highlightindex] ?? null;
            if ($customer) {
                // Set the query to the customer's name or default text
                $this->query = $customer['name'] ?? 'Unnamed customer';
                // Clear the customers list and reset highlight
                $this->redirect(route('admin.registration.show', $customer['id']));
            }
        }
    }
    public function render()
    {
        return view('livewire.Customer-Search');
    }
}
