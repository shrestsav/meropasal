<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function add_item_fields()
    {
        $fields = config('fields.add_item');
        return $fields;
    }
}
