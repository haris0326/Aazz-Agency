<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content_2' => 'nullable|string',
            'content_3' => 'nullable|string',
            'main_service_id' => 'required|exists:main_service,id',
        ]);

        // New content record create karna
        $content = new Content;
        $content->title = $request->input('title');
        $content->description = $request->input('description');
        $content->content_2 = $request->input('content_2');
        $content->content_3 = $request->input('content_3');
        $content->main_service_id = $request->input('main_service_id');

        // Save karna content
        $content->save();

        // Success message ke saath redirect karna
        return redirect()->route('content.index')->with('success', 'Content created successfully.');
    }
}
