<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewslettersController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json($request->user()->newsletters);
    }

    public function show(Request $request, int $id): JsonResponse
    {
        $newsletter = $request->user()->newsletters()->find($id);

        if (!$newsletter) {
            return response()->json(['message' => 'Newsletter not found'], 404);
        }

        return response()->json($newsletter);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        $newsletter = $request->user()->newsletters()->create([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
        ]);

        return response()->json($newsletter, 201);
    }

    public function destroy(Request $request, int $id): JsonResponse
    {
        $newsletter = $request->user()->newsletters()->find($id);

        if (!$newsletter) {
            return response()->json(['message' => 'Newsletter not found'], 404);
        }

        $newsletter->delete();

        return response()->json(['message' => 'Newsletter deleted successfully'], 200);
    }
}
