<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        echo 'Im inside the app!';
    }   

    public function newNote()
    {
        echo 'Im am creating a new note!';
    }
}