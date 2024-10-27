<?php

namespace App\Http\Controllers;

use App\Models\OrderFeature;
use Illuminate\Http\Request;

class OrderFeatureController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'feature_title' => 'required|string|max:255',
            'main_service_id' => 'required|exists:main_service,id', // Ensure main_service_id exists in main_service table
        ]);

        // New Order Feature record create karna
        $orderFeature = new OrderFeature;
        $orderFeature->feature_title = $request->input('feature_title');
        $orderFeature->main_service_id = $request->input('main_service_id');

        // Save karna OrderFeature
        $orderFeature->save();

        // Success message ke saath redirect karna
        return redirect()->route('order_features.index')->with('success', 'Order Feature created successfully.');
    }
}
