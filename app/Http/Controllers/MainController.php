<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {
        $id = session('user.id'); 
        $notes = User::find($id)->notes()->get()->toArray();     

        return view('home', ['notes' => $notes]);
    }   

    public function newNote()
    {
        // show new note view
        return view('new_note');
    }

    public function newNoteSubmit(Request $request)
    {
        echo "Im creating a new note";
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);
        echo "Im editing note with id => " . $id;
    }

    public function deleteNote($id)
    {
        $id = Operations::decryptId($id);
        echo "im deleting note with id => " . $id;
    }
}