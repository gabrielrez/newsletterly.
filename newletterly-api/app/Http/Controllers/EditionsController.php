<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EditionsController extends Controller
{
    public function index(Request $request, int $newsletter_id): JsonResponse
    {
        $newsletter = $request->user()->newsletters()->findOrFail($newsletter_id);

        return response()->json($newsletter->editions);
    }

    public function show(Request $request, int $id)
    {
        $edition = Edition::with('newsletter')
            ->whereRelation('newsletter', 'user_id', $request->user()->id)
            ->findOrFail($id);

        return response()->json($edition);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'newsletter_id' => 'required|exists:newsletters,id',
        ]);

        $newsletter = $request->user()->newsletters()
            ->findOrFail($validated['newsletter_id']);

        $edition = $newsletter->editions()->create([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'content' => $validated['content'],
        ]);

        return response()->json($edition, 201);
    }
}
