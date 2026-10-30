<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    // Display all visitors
public function index(Request $request)
{
    $visitors = Visitor::query()
        ->when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('visitors.index', compact('visitors'));
}

    // Show add visitor form
    public function create()
    {
        return view('visitors.create');
    }

    // Store visitor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        Visitor::create($validated);

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor added successfully!');
    }

    // Display visitor details
    public function show(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('visitors.show', compact('visitor'));
    }

    // Show edit form
    public function edit(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('visitors.edit', compact('visitor'));
    }

    // Update visitor
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $visitor = Visitor::findOrFail($id);
        $visitor->update($validated);

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor updated successfully!');
    }

    // Delete visitor
    public function destroy(string $id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor deleted successfully!');
    }
}