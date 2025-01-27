<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewslettersController extends Controller
{
    public function index()
    {
        return Newsletter::all();
    }

    public function store(Request $request)
    {
        $newsletter = $request->validate([
            'title' => 'required|max:50',
            'subtitle' => 'required|max:255',
            'user_id' => 'required'
        ]);

        return Newsletter::create($newsletter);
    }

    public function show(Newsletter $newsletter)
    {
        return $newsletter;
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return ['message' => 'Newsletter deleted successfully'];
    }
}
