<?php

use App\Models\Customer;
use Livewire\Component;

new class extends Component
{
    public $editingCustomerId = null;

    public $name = '';
    public $email = '';
    public $phone = '';
    public $address = '';

    public function getCustomersProperty()
    {
        return Customer::all();
    }

    public function deleteCustomer($id)
    {
        Customer::findOrFail($id)->delete();
    }

    public function editCustomer($id)
    {
        $customer = Customer::findOrFail($id);

        $this->editingCustomerId = $customer->id;
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->address = $customer->address;
    }

    public function updateCustomer()
    {
        $customer = Customer::findOrFail($this->editingCustomerId);

        $customer->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
]);

        $this->cancelEdit();
    }

    public function cancelEdit()
    {
        $this->editingCustomerId = null;
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
    }
};
?>

<style>
    .customers-container {
        max-width: 1100px;
        margin: 30px auto;
        padding: 0 20px;
    }

    .customers-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .customers-header h1 {
        margin: 0;
        font-size: 30px;
        color: #333;
    }

    .new-customer-button {
        display: inline-block;
        padding: 11px 20px;
        background: #198754;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: 0.2s;
    }

    .new-customer-button:hover {
        background: #157347;
    }

    .customers-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .customers-table th {
        background: #343a40;
        color: white;
        padding: 14px;
        text-align: left;
        font-weight: 600;
    }

    .customers-table td {
        padding: 13px 14px;
        border-bottom: 1px solid #eee;
        color: #444;
    }

    .customers-table tbody tr:hover {
        background: #f8f9fa;
    }

    .customers-table tbody tr:last-child td {
        border-bottom: none;
    }

    .actions {
        white-space: nowrap;
    }

    .action-button {
        display: inline-block;
        padding: 7px 12px;
        margin-right: 4px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        font-size: 13px;
        color: white;
    }

    .edit-button {
        background: #0d6efd;
    }

    .edit-button:hover {
        background: #0b5ed7;
    }

    .delete-button {
        background: #dc3545;
    }

    .delete-button:hover {
        background: #bb2d3b;
    }

    .pdf-button {
        background: #6c757d;
    }

    .pdf-button:hover {
        background: #5c636a;
    }

    .edit-form {
        background: #f8f9fa;
        padding: 25px;
        margin-bottom: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .edit-form h2 {
        margin-top: 0;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #444;
    }

    .form-group input {
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 15px;
    }

    .save-button {
        background: #198754;
    }

    .cancel-button {
        background: #6c757d;
    }
</style>


<div class="customers-container">

    <div class="customers-header">

        <h1>Πελάτες</h1>

        <a
            href="{{ url('/customers/create') }}"
            class="new-customer-button"
        >
            + Νέος Πελάτης
        </a>

    </div>


    @if ($editingCustomerId)

        <div class="edit-form">

            <h2>Επεξεργασία Πελάτη</h2>

            <form wire:submit="updateCustomer">

                <div class="form-group">
                    <label>Όνομα</label>
                    <input type="text" wire:model="name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" wire:model="email">
                </div>

                <div class="form-group">
                    <label>Τηλέφωνο</label>
                    <input type="text" wire:model="phone">
                </div>

                <div class="form-group">
                <label>Διεύθυνση</label>
                <input type="text" wire:model="address">

        </div>

                <button
                    type="submit"
                    class="action-button save-button"
                >
                    Αποθήκευση
                </button>

                <button
                    type="button"
                    wire:click="cancelEdit"
                    class="action-button cancel-button"
                >
                    Ακύρωση
                </button>

            </form>

        </div>

    @endif


    <table class="customers-table">

        <thead>

            <tr>
                <th>ID</th>
                <th>Όνομα</th>
                <th>Email</th>
                <th>Τηλέφωνο</th>
                <th>Διεύθυνση</th>
                <th>Ενέργειες</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($this->customers as $customer)

                <tr>

                    <td>{{ $customer->id }}</td>

                    <td>
                        <strong>{{ $customer->name }}</strong>
                    </td>

                    <td>{{ $customer->email }}</td>

                    <td>{{ $customer->phone }}</td>

                    <td>{{ $customer->address }}</td>

                    <td class="actions">

                        <button
                            wire:click="editCustomer({{ $customer->id }})"
                            class="action-button edit-button"
                        >
                            Edit
                        </button>

                        <button
                            wire:click="deleteCustomer({{ $customer->id }})"
                            wire:confirm="Είσαι σίγουρος ότι θέλεις να διαγράψεις αυτόν τον πελάτη;"
                            class="action-button delete-button"
                        >
                            Delete
                        </button>

                        <a
                            href="{{ url('/customers/' . $customer->id . '/pdf') }}"
                            target="_blank"
                            class="action-button pdf-button"
                        >
                            PDF
                        </a>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>