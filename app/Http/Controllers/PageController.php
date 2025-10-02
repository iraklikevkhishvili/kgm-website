<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    public function show(string $slug, Request $request)
    {
        $page = Page::published()->where('slug', $slug)->first();

        if (!$page) {
            throw new NotFoundHttpException();
        }

        // Optionally cache rendered response if pages don’t change often:
        // return cache()->remember("page:{$slug}", 300, fn() =>
        //     response()->view($page->view_path, ['page' => $page])
        // );

        return response()->view($page->template, [
            'page' => $page,
        ]);
    }
}
