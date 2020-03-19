<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Convert;
use Illuminate\Http\Request;

class MarkDownController extends Controller
{
    public function process(Request $request) {
        return (new Convert)->parseMarkdownToHTML($request->markdownval);
    }
}
