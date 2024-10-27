<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'main_service_id' => 'required|exists:main_service,id',
        ]);

        // New FAQ record create karna
        $faq = new Faq;
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->main_service_id = $request->input('main_service_id');

        // Save karna FAQ
        $faq->save();

        // Success message ke saath redirect karna
        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
    }
}
