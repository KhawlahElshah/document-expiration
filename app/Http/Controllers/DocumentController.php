<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Category;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = auth()->user()->documents()->get();

        return view('documents.index')->with('documents', $documents);
    }

    public function create()
    {
        $categories = Category::all();

        return view('documents.create')->with('categories', $categories);
    }

    public function store()
    {
        request()->validate([
            'name'                      => 'required',
            'notes'                     => 'nullable',
            'expiry_date'               => 'required|date',
            'category_id'               => 'required',
            'notify_before_number_days' => 'required|integer'
        ]);

        $document = Document::create([
            'name'        => request('name'),
            'notes'       => request('notes'),
            'expiry_date' => request('expiry_date'),
            'category_id' => request('category_id'),
            'user_id'     => auth()->id(),
        ]);

        $document->saveReminder(request('notify_before_number_days'));

        return redirect(route('documents.index'));
    }
}