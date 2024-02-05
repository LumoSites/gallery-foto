<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;

class CategoriController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->keyword;

        if ($keyword == '' | $keyword == 'All' | $keyword == 'all' | $keyword == 'ALL') {
            $categoris = Categori::paginate(16);
        } else {
            $categoris = Categori::where('name', 'LIKE', '%'.$keyword.'%')->paginate(16);
        }


        return view('dashboard.categori.index', [
            'categoris' => $categoris,
        ]);
    }

    public function add() {
        return view('dashboard.categori.add');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|max:255'
        ]);

        Categori::create($request->all());

        return redirect('/categoris')->with('success', 'Categori Added success!');
    }

    public function edit($id) {
        $categori = Categori::findOrFail($id);
        return view('dashboard.categori.edit', [
            'categori' => $categori
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'name' => 'required|max:255'
        ]);

        $categori = Categori::findOrFail($id);
        $categori->update($validateData);
        return redirect('/categoris')->with('success', 'Categori edit success!');
    }

    public function destroy($id) {
        Categori::destroy($id);

        return redirect('/categoris')->with('success', 'Categori deleted success!');
    }
}
