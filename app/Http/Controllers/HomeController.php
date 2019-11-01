<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
            ->with('active_documents', auth()->user()->documents()->active()->get())
            ->with('expired_documents', auth()->user()->documents()->expired()->get())
            ->with('warned_documents', auth()->user()->documents()->warned()->get());
    }
}