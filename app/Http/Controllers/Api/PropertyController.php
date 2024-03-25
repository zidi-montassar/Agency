<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return PropertyResource::collection(property::limit(4)->with('options')->get());
    }
}
