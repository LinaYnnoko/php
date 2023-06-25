<?php

namespace App\Http\Controllers\Auth;

use App\Models\Catalog;

class CatalogController extends Catalog
{
    public function catalog()
    {
        $animals = Catalog::all();
        return view('catalog', compact('animals'));
    }
}

