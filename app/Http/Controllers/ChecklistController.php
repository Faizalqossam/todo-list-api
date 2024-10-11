<?php

namespace App\Http\Controllers;

use App\Models\ChecklistModel;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        return ChecklistModel::with('items')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string']);
        return ChecklistModel::create($validated);
    }

    public function destroy($id)
    {
        $checklist = ChecklistModel::findOrFail($id);
        $checklist->delete();

        return response()->json(['message' => 'Checklist deleted successfully']);
    }

}
