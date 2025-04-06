<?php

namespace App\Http\Controllers;

use App\Models\ClientPayment;
use App\Models\ManageClient;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;

class ManageClientController extends Controller
{
    // public function index()
    // {
    //     $clients = ManageClient::orderBy('created_at', 'desc')->get();
    //     return view('admin.clients.index', compact('clients'));
    // }
    // public function AddNewClient(Request $request)
    // {

    //     $request->validate([
    //         'name' => 'required|string',
    //         'mobile' => 'nullable|string',
    //         'email' => 'nullable|email',
    //         'plantype' => 'nullable|string',
    //         'planEndDate' => 'nullable|string',
    //         'trainerStatus' => 'nullable|string',
    //         'dueAmount' => 'nullable|string',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

    //     ]);
    //     $imagePath = null;

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('images/clients', 'public');
    //     }
    //     $client = new ManageClient();

    //     $client->image = $imagePath;


    //     $client->name = $request->input('name');
    //     $client->mobile = $request->input('mobile');
    //     $client->email = $request->input('email');
    //     $client->plantype = $request->input('plantype');
    //     $client->planEndDate = $request->input('planEndDate');
    //     $client->trainerStatus = $request->input('trainerStatus');
    //     $client->dueAmount = $request->input('dueAmount');
    //     $client->save();

    //     return redirect()->route('client.create')->with('success', 'Client Added Successfully.');
    // }
    // public function UpdateClient(Request $request)
    // {

    //     $request->validate([
    //         'name' => 'required|string',
    //         'mobile' => 'nullable|string',
    //         'email' => 'nullable|email',
    //         'plantype' => 'nullable|string',
    //         'planEndDate' => 'nullable|string',
    //         'trainerStatus' => 'nullable|string',
    //         'dueAmount' => 'nullable|string',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

    //     ]);
    //     $client = ManageClient::find($request->input('id'));


    //     if (!$client) {
    //         return redirect()->route('datatrainer.create')->with('error', 'Trainer not found');
    //     }

    //     // Handle File Upload for image
    //     if ($request->hasFile('image')) {
    //         // Store new image
    //         $imagePath = $request->file('image')->store('images/clients', 'public');
    //         $client->image = $imagePath;
    //     }

    //     // $client = ManageClient::find('id');
    //     $client->name = $request->input('name');
    //     $client->mobile = $request->input('mobile');
    //     $client->email = $request->input('email');
    //     $client->plantype = $request->input('plantype');
    //     $client->planEndDate = $request->input('planEndDate');
    //     $client->trainerStatus = $request->input('trainerStatus');
    //     $client->dueAmount = $request->input('dueAmount');
    //     $client->save();

    //     return redirect()->route('client.create')->with('success', 'Client Updated Successfully.');
    // }
    // public function destroy($id)
    // {
    //     $client = ManageClient::find($id);
    //     $client->delete();

    //     return redirect()->route('client.create')->with('error', 'Client Deleted Successfully.');
    // }

    public function index()
    {
        $clients = ManageClient::with('payments')->orderBy('created_at', 'desc')->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function AddNewClient(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'nullable|string',
            'email' => 'nullable|email',
            'plantype' => 'nullable|string',
            'planEndDate' => 'nullable|string',
            'trainerStatus' => 'nullable|string',
            'total_amount' => 'required|numeric|min:0', // New field for total plan cost
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/clients', 'public');
        }

        $client = new ManageClient();
        $client->image = $imagePath;
        $client->name = $request->input('name');
        $client->mobile = $request->input('mobile');
        $client->email = $request->input('email');
        $client->plantype = $request->input('plantype');
        $client->planEndDate = $request->input('planEndDate');
        $client->trainerStatus = $request->input('trainerStatus');
        $client->total_amount = $request->input('total_amount');
        $client->save();

        return redirect()->route('client.create')->with('success', 'Client Added Successfully.');
    }

    public function UpdateClient(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'nullable|string',
            'email' => 'nullable|email',
            'plantype' => 'nullable|string',
            'planEndDate' => 'nullable|string',
            'trainerStatus' => 'nullable|string',
            'total_amount' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $client = ManageClient::find($request->input('id'));
        if (!$client) {
            return redirect()->route('client.create')->with('error', 'Client not found');
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/clients', 'public');
            $client->image = $imagePath;
        }

        $client->name = $request->input('name');
        $client->mobile = $request->input('mobile');
        $client->email = $request->input('email');
        $client->plantype = $request->input('plantype');
        $client->planEndDate = $request->input('planEndDate');
        $client->trainerStatus = $request->input('trainerStatus');
        $client->total_amount = $request->input('total_amount');
        $client->save();

        return redirect()->route('client.create')->with('success', 'Client Updated Successfully.');
    }

    public function destroy($id)
    {
        $client = ManageClient::find($id);
        $client->delete();
        return redirect()->route('client.create')->with('error', 'Client Deleted Successfully.');
    }

    public function addPayment(Request $request, $client_id)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $client = ManageClient::find($client_id);
        if (!$client) {
            return redirect()->route('client.create')->with('error', 'Client not found');
        }

        $payment = new ClientPayment();
        $payment->client_id = $client_id;
        $payment->amount_paid = $request->input('amount_paid');
        $payment->payment_date = $request->input('payment_date');
        $payment->payment_method = $request->input('payment_method');
        $payment->notes = $request->input('notes');
        $payment->save();

        return redirect()->route('client.create')->with('success', 'Payment Added Successfully.');
    }
}
