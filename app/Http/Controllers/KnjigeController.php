<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Knjige;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class KnjigeController extends Controller
{
   public function index() {
    $knjige = Knjige::all();   
      return view('knjige.index',['knjige' => $knjige]);
   }

   public function create() {
    return view('knjige.create');
   }

   public function store(Request $request) {
         $this->validate($request, [
            'title' => 'required',
            'publisher' => 'required',
            'price' => 'required|decimal:0,2',
            'language' => 'required',
            'description' => 'nullable',
         ]);

         $knjiga = new Knjige();
         $knjiga->title = $request->input('title');
         $knjiga->publisher = $request->input('publisher');
         $knjiga->language = $request->input('language');
         $knjiga->price = (int) $request->input('price');
         $knjiga->description = $request->input('description');
         $knjiga->user_id = Auth::user()->id;

         $knjiga->save();

         return redirect(route('knjige.index'));

         }

         public function edit(Knjige $knjige) {
            return view('knjige.edit', ['knjige' => $knjige]);
         }

         public function destroy(Knjige $knjige) {
            Gate::authorize('delete', $knjige);
            $knjige->delete();
            return redirect(route('knjige.index'))->with('sucess', 'Knjiga je uspješno obrisana');
         }

         public function update(Request $request) {
            
            $data = $request->validate([
               'title' => 'required',
               'publisher' => 'required',
               'price' => 'required|decimal:0,2',
               'language' => 'required',
               'description' => 'nullable',
            ]);

            $knjiga = new Knjige();
            $knjiga = $knjiga->find($request->input('id'));
            $knjiga->title = $request->input('title');
            $knjiga->publisher = $request->input('publisher');
            $knjiga->language = $request->input('language');
            $knjiga->price = (int) $request->input('price');
            $knjiga->description = $request->input('description');

            Gate::authorize('update', $knjiga);
            
                      

            $knjiga->save();
            return redirect(route('knjige.index'))->with('success', 'Knjiga je uspjesno updejtovana');
         }

       

   }


