<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        echo 'Im am creating a new note!';
    }

    public function editNote($id)
    {
        try {
            $id = Crypt::decrypt($id);
        }   catch (DecryptException $e) {
            return redirect()->route('home'); 
        }

        echo "Im editing note with id => " . $id;
    }

    public function deleteNote($id)
    {
        try {
            $id = Crypt::decrypt($id);
        }   catch (DecryptException $e) {
            return redirect()->route('home'); 
        }

        echo "im deleting note with id => " . $id;
    }
}