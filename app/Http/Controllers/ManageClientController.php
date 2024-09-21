<?php

namespace App\Http\Controllers;

use App\Models\ManageClient;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;

class ManageClientController extends Controller
{
    public function index()
    {
        $client = ManageClient::all();
        return view('admin.clients.index', compact('client'));
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
            'dueAmount' => 'nullable|string',
        ]);
        $client = new ManageClient();
        $client->name = $request->input('name');
        $client->mobile = $request->input('mobile');
        $client->email = $request->input('email');
        $client->plantype = $request->input('plantype');
        $client->planEndDate = $request->input('planEndDate');
        $client->trainerStatus = $request->input('trainerStatus');
        $client->dueAmount = $request->input('dueAmount');
        $client->save();

        return redirect()->route('client.index')->with('success', 'Client Added Successfully.');
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
            'dueAmount' => 'nullable|string',
        ]);
        $client = ManageClient::find('id');
        $client->name = $request->input('name');
        $client->mobile = $request->input('mobile');
        $client->email = $request->input('email');
        $client->plantype = $request->input('plantype');
        $client->planEndDate = $request->input('planEndDate');
        $client->trainerStatus = $request->input('trainerStatus');
        $client->dueAmount = $request->input('dueAmount');
        $client->save();

        return redirect()->route('client.index')->with('success', 'Client Updated Successfully.');
    }
    public function destroy($id)
    {
        $client = ManageClient::find($id);
        $client->delete();

        return redirect()->route('client.index')->with('error', 'Client Deleted Successfully.');
    }
}
