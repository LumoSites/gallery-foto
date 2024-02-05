<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Categori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index');
    }

    public function users(Request $request) {
        $keyword = $request->keyword;
        if ($keyword == '' | $keyword == 'All' | $keyword == 'all' | $keyword == 'ALL') {
            $users = User::latest()->where('role_id', '!=', 1)->paginate(15);
        } else {
            $users = User::where('first_name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('last_name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('username', 'LIKE', '%'.$keyword.'%')
                    ->paginate(16);
        }

        return view('dashboard.users', [
            'users' => $users
        ]);
    }

    public function userDeleted($id) {
        User::latest()->findOrFail($id)->delete();
        return redirect()->back()->with('success','deleted user success');
    }

    public function categori() {
        $categoris = Categori::all();
        $fotos = Foto::latest()->paginate(16);
        return view('categori', [
            'categoris' => $categoris,
            'fotos' => $fotos
        ]);
    }

    public function categoriDetail($id) {
        $categori = Categori::with(['foto'])->findOrFail($id);
        return view('categori-detail', [
            'categori' => $categori
        ]);
    }
}
