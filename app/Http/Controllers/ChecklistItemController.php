<?php

namespace App\Http\Controllers;

use App\Models\ChecklistItemModel;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    public function index($checklistId)
    {
        $items = ChecklistItemModel::where('checklistId', $checklistId)->get();
        return response()->json($items);
    }

    public function store(Request $request, $checklistId)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $item = ChecklistItemModel::create([
            'checklistId' => $checklistId,
            'name' => $validated['name']
        ]);

        return response()->json($item);
    }

    public function update(Request $request, $checklistId, $itemId)
    {
        $item = ChecklistItemModel::where('checklistId', $checklistId)->findOrFail($itemId);
        $item->update($request->only('name', 'isCompleted'));

        return response()->json($item);
    }

    public function destroy($checklistId, $itemId)
    {
        $item = ChecklistItemModel::where('checklistId', $checklistId)->findOrFail($itemId);
        $item->delete();

        return response()->json(['message' => 'Checklist item deleted successfully']);
    }
}
