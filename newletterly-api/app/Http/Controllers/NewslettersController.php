<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewslettersController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return response()->json($user->newsletters);
    }

    public function show(Request $request, $id)
    {
        $newsletter = $request->user()->newsletters()->find($id);

        if (!$newsletter) {
            return response()->json(['message' => 'Newsletter not found'], 404);
        }

        return response()->json($newsletter);
    }

    public function store(Request $request)
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

    public function destroy(Request $request, $id)
    {
        $newsletter = $request->user()->newsletters()->find($id);

        if (!$newsletter) {
            return response()->json(['message' => 'Newsletter not found'], 404);
        }

        $newsletter->delete();

        return response()->json(['message' => 'Newsletter deleted successfully'], 200);
    }
}
