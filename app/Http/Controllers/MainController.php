<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Models\Note;

class MainController extends Controller
{
    public function index(){
        // Load user's notes
        $id = session('user_id');
        $user = User::find($id)->toArray();
        $notes = User::find($id)->notes()->whereNull('deleted_at')->get()->toArray();

        //dd(compact('user', 'notes'));
        return view('main.home', compact('user', 'notes'));
    }
    public function newNote(){
        return view('main.new_note');
    }

    public function newNoteSubmit(Request $request){
        $request->validate([
            'text_title' => 'required|max:255',
            'text_content' => 'required',
        ]);

        $note = new Note();
        $note->user_id = session('user_id');
        $note->text_title = $request->input('text_title');
        $note->text_content = $request->input('text_content');
        $note->save();

        return redirect()->route('home');
    }

    public function editNote($id){

        try {
            // Decrypt the ID
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            // Handle decryption failure
            return redirect()->route('home')->withErrors(['id_error' => 'Invalid note ID']);
        }

        $note = User::find(session('user_id'))->notes()->find($id)->first();
        //dd($note);
        return view('main.edit_note', compact('note'));
    }
    public function deleteNote($id){

        try {
            // Decrypt the ID
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            // Handle decryption failure
            return redirect()->route('home')->withErrors(['id_error' => 'Id inválido']);
        }

        $note = User::find(session('user_id'))->notes()->find($id);
        if (!$note) {
            return redirect()->route('home')->withErrors(['id_error' => 'Nota não encontrada']);
        }

        //$note->delete();
        $note->deleted_at = date('Y-m-d H:i:s');
        $note->save();

        return redirect()->route('home')->with('success', 'Nota deletada com sucesso');
    }

    public function editNoteSubmit(Request $request)
    {
        try {
            // Decrypt the ID
            $id = Crypt::decrypt($request->input('note_id'));
        } catch (DecryptException $e) {
            // Handle decryption failure
            return redirect()->route('home')->withErrors(['id_error' => 'Id invalido']);
        }

        $note = User::find(session('user_id'))->notes()->find($id);
        if (!$note) {
            return redirect()->route('home')->withErrors(['id_error' => 'Nota não encontrada']);
        }

        $note->text_title = $request->input('text_title');
        $note->text_content = $request->input('text_content');
        $note->save();

        return redirect()->route('home')->with('success', 'Nota atualizada com sucesso');
    }
}
