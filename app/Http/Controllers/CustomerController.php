<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use TCPDF;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    return redirect('/customers');
}

public function edit(Customer $customer)
{
    return view('customers.edit', compact('customer'));
}

public function update(Request $request, Customer $customer)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    $customer->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
    ]);

    return redirect('/customers');
}

public function destroy(Customer $customer)
{
    $customer->delete();

    return redirect('/customers');
}


public function pdf(Customer $customer)
{
    $pdf = new TCPDF();

    $pdf->SetCreator('Customer Manager');
    $pdf->SetTitle('Customer Details');

    $pdf->AddPage();

    $pdf->SetFont('dejavusans', '', 14);

    $pdf->Cell(0, 10, 'Customer Details', 0, 1, 'C');

    $pdf->Ln(10);

    $pdf->SetFont('dejavusans', '', 12);

    $pdf->Cell(40, 10, 'Name:', 0, 0);
    $pdf->Cell(0, 10, $customer->name, 0, 1);

    $pdf->Cell(40, 10, 'Email:', 0, 0);
    $pdf->Cell(0, 10, $customer->email, 0, 1);

    $pdf->Cell(40, 10, 'Phone:', 0, 0);
    $pdf->Cell(0, 10, $customer->phone, 0, 1);

    $pdf->Cell(40, 10, 'Address:', 0, 0);
    $pdf->Cell(0, 10, $customer->address, 0, 1);

    $pdf->Output('customer.pdf', 'I');
}


}