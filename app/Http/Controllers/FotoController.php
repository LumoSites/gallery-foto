<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Categori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->keyword;
        // $user = User::with(['foto'])->findOrFail(Auth::user()->id);


        if ($keyword == '' | $keyword == 'All' | $keyword == 'all' | $keyword == 'ALL') {
            $fotos = Foto::latest()->paginate(16);
        } else {
            $fotos = Foto::latest()->with(['categori', 'user'])->where('title', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('categori', function($query) use ($keyword){
                            $query->where('name', 'LIKE', '%'.$keyword.'%');
                        })
                        ->orWhereHas('user', function($query) use ($keyword){
                            $query->where('username', 'LIKE', '%'.$keyword.'%');
                        })
                        ->orWhere('description', 'LIKE', '%'.$keyword.'%')->paginate(16);
        }

        return view('index',[
            'fotos' => $fotos,
        ]);
    }

    public function detail($id) {
        $foto = Foto::with(['categori', 'user'])->findOrFail($id);
        $fotoTerkaits = Foto::limit(6)->where('categori_id', $foto->categori_id)->where('id', '!=', $foto->id)->get();
        return view('detail',[
            'foto' => $foto,
            'fotoTerkaits' => $fotoTerkaits
        ]);
    }

    public function dashboardFoto(Request $request) {
        $keyword = $request->keyword;


        if ($keyword == '' | $keyword == 'All' | $keyword == 'all' | $keyword == 'ALL') {
            $fotos = Foto::latest()->paginate(16);
        } else {
            $fotos = Foto::latest()->with(['categori', 'user'])->where('title', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('categori', function($query) use ($keyword){
                            $query->where('name', 'LIKE', '%'.$keyword.'%');
                        })
                        ->orWhereHas('user', function($query) use ($keyword){
                            $query->where('username', 'LIKE', '%'.$keyword.'%');
                        })
                        ->orWhere('description', 'LIKE', '%'.$keyword.'%')->paginate(16);
        }

        return view('dashboard.foto.index', [
            'fotos' => $fotos
        ]);
    }

    public function add() {
        $categoris = Categori::all();
        return view('dashboard.foto.add', [
            'categoris' => $categoris
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'categori_id' => 'required',
            'img' => 'image|file|mimes:png,jpg,jpeg,gif,svg',
            'description' => 'required'
        ]);

        $newName = null;
        if($request->file('img')){
            $ekstension = $request->file('img')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$ekstension;
            $request->file('img')->storeAs('photo', $newName);
        }

        $request['foto'] = $newName;
        $request['user_id'] = Auth::user()->id;
        $request['upload'] = Carbon::now()->format('Y-m-d');

        Foto::create($request->all());

        return redirect('/fotos')->with('success', 'Added foto has success!');

    }

    public function edit($id) {
        $foto = Foto::with(['categori'])->findOrFail($id);
        if($foto->user_id != Auth::user()->id) {
            return redirect()->back();
        }
        $categoris = Categori::where('id', '!=', $foto->categori_id)->get();
        return view('dashboard.foto.edit', [
            'foto' => $foto,
            'categoris' => $categoris
        ]);
    }

    public function update(Request $request, $id) {
        $foto = Foto::findOrFail($id);

        if($foto->user_id != Auth::user()->id) {
            return redirect()->back();
        }

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'categori_id' => 'required',
            'description' => 'required'
        ]);

        if($request->file('img')) {
            if($request->oldImage != null) {
                $image_path = public_path('storage/photo/'.$request->oldImage);
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $ekstension = $request->file('img')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$ekstension;
            $request->file('img')->storeAs('photo', $newName);
        } else {
            $newName = $request->oldImage;
        }

        $request['foto'] = $newName;
        $request['user_id'] = Auth::user()->id;
        $request['upload'] = Carbon::now()->format('Y-m-d');

        $foto->update($request->all());

        return redirect('/fotos')->with('success', 'Updated foto has success!');

    }

    public function destroy($id) {
        $foto = Foto::findOrFail($id);
        if ($foto->user_id != Auth::user()->id) {
            return redirect()->back();
        }
        if ($foto->foto) {
            $image_path = public_path('storage/photo/'.$foto->foto);
            if(file_exists($image_path)) {
                unlink($image_path);
            }
        }

        Foto::destroy($foto->id);

        return redirect('/fotos')->with('success', 'Deleted foto has success!');

    }
}
