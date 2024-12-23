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
        $id = $this->decryptId($id);
        echo "Im editing note with id => " . $id;
    }

    public function deleteNote($id)
    {
        $id = $this->decryptId($id);
        echo "im deleting note with id => " . $id;
    }

    private function decryptId($id)
    {
        // check if $id is encrypted
        try {
            $id = Crypt::decrypt($id);
        }   catch (DecryptException $e) {
            return redirect()->route('home'); 
        }
        return $id;
    }
}