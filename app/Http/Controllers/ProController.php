<?php

namespace App\Http\Controllers;

use App\Models\Pro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_VIEW = 'pros.';
    const PATH_UPLOAD = 'pros';
    public function index()
    {
        $data = Pro::latest()->paginate(5);
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
            'name' => 'required|unique:pros',
            'img' => 'nullable|image|max:3000',
            'price' => ['required', 'numeric', 'max:10000'],
            'status' => ['required', Rule::in([Pro::STATUS_HIDE, Pro::STATUS_SHOW])]
        ]);
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }
        Pro::create($data);
        return back()->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pro $pro)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('pro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pro $pro)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('pro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pro $pro)
    {
        $request->validate([
            'name' => 'required|unique:pros',
            'img' => 'nullable|image|max:3000',
            'price' => ['required', 'numeric', 'max:10000'],
            'status' => ['required', Rule::in([Pro::STATUS_HIDE, Pro::STATUS_SHOW])]
        ]);
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }
        $oldImg = $pro->img;
        $pro->update($data);
        if ($request->hasFile('img') && Storage::exists($pro->img)) {
            Storage::delete($oldImg);
        }
        return back()->with('msg', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pro $pro)
    {
        $pro->delete();
        if (Storage::exists($pro->img)) {
            Storage::delete($pro->img);
        }
        return redirect()->route('pros.index')->with('msg', 'Thành công');
    }
    public function ads()
    {
    }
}
