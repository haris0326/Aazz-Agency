<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestOrder;

class TestOrderController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'step_1' => 'required|string',
            'step_2' => 'required|string',
            'step_3' => 'required|string',
            'step_4' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Image validation
            'main_service_id' => 'required|exists:main_service,id', // Ensure main_service_id exists in main_service table
        ]);

        // Image handling
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('test_orders', 'public'); // Save image in 'public/test_orders' folder
        }

        // New TestOrder record create karna
        $testOrder = new TestOrder;
        $testOrder->title = $request->input('title');
        $testOrder->description = $request->input('description');
        $testOrder->step_1 = $request->input('step_1');
        $testOrder->step_2 = $request->input('step_2');
        $testOrder->step_3 = $request->input('step_3');
        $testOrder->step_4 = $request->input('step_4');
        $testOrder->image = $imagePath;
        $testOrder->main_service_id = $request->input('main_service_id');

        // Save karna TestOrder
        $testOrder->save();

        // Success message ke saath redirect karna
        return redirect()->route('test_orders.index')->with('success', 'Test Order created successfully.');
    }
}
