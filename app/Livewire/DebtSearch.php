<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\debts;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DebtSearch extends Component
{
    public $query = '';
    public $customers = [];

    public $highlightindex = 0;
    public $selectedValue = 0;
    public $datas = [];

    public $selectedCustomer = '';

    public function mount()
    {
        $this->fechData();

        $this->selectedValue = request()->query('status', $this->selectedValue);
        $this->selectedCustomer = request()->query('customer', '');
    }
    public function fechData()
    {

        $this->datas =  debts::getStatusOptions();
    }

    public function updated($property)
    {
        if ($property === 'selectedValue') {


            $this->redirect(route('admin.debt.search', [
                'customer' => $this->selectedCustomer,
                'status' => $this->selectedValue,
            ]));
        }
    }
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
            $this->selectedCustomer = $this->customers[$index]['id'];
            $this->query = $this->customers[$index]['name'] ?? 'Unnamed customer';

            $this->redirect(route('admin.debt.search', [
                'customer' => $this->selectedCustomer,
                'status' => $this->selectedValue,
            ]));
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
                $this->redirect(route('admin.debt.search', [
                    'customer' => $customer['id'],
                    'status' => $this->selectedValue,

                ]));
            }
        }
    }
    public function render()
    {
        return view('livewire.debt-search');
    }
}
