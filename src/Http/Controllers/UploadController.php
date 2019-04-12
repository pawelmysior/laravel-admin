<?php

namespace PawelMysior\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request): string
    {
        return Storage::disk('public')->url($request->file('image')->store('uploads', 'public'));
    }
}
