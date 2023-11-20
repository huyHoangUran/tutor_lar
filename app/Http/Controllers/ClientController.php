<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'clients.';
    const PATH_UPLOAD = 'clients';
    public function index()
    {
        $data = Client::latest()->paginate(10);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'company_name' => 'required',
            'account_owner' => 'required|unique:clients',
            'img' => 'nullable|image|max:3000',
            'project' => 'required|numeric',
            'invoice' => ['required', 'numeric', 'max:10000'],
            'tag' => 'nullable',
            'category' => 'required',
            'status' => ['required', Rule::in([CLient::STATUS_ACTIVE, Client::STATUS_INACTIVE])]
        ]);
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }
        Client::create($data);
        return back()->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('v'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'company_name' => 'required',
            'account_owner' => [
                'required',
                Rule::unique('clients')->ignore($client->id)
            ],
            'img' => 'nullable|image|max:3000',
            'project' => 'required|numeric',
            'invoice' => ['required', 'numeric', 'max:10000'],
            'tag' => 'nullable',
            'category' => 'required',
            'status' => ['required', Rule::in([CLient::STATUS_ACTIVE, Client::STATUS_INACTIVE])]
        ]);
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }
        $oldImg = $client->img;
        $client->update($data);

        
        if (Storage::exists($client->img) && $request->hasFile('img')) {
            Storage::delete($oldImg);
        }
        return back()->with('success', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        if (Storage::exists($client->img)) {
            Storage::delete($client->img);
        }
        return redirect()->route('clients.index')->with('msg', 'Thành công');
    }
}