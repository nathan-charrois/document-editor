<?php
namespace App\Http\Controllers;

use App\Document;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\DocumentCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DocumentsController extends Controller
{    
    public function index()
    {
        $sort_string = Input::get('sort');

        $documents = Document::orderByCustomString($sort_string);

        return new DocumentCollection($documents);
    }

    public function show($id)
    {
        return new DocumentResource(Document::find($id));
    }

}
