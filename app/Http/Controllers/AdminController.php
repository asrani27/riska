<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kasi;
use App\Models\Kategori;
use App\Models\Kepala;
use App\Models\Penyedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function user()
    {
        $data = User::orderBy('id', 'DESC')->paginate(15);
        return view('admin.user.index', compact('data'));
    }
    public function user_create()
    {
        return view('admin.user.create');
    }
    public function user_edit($id)
    {
        $data = User::find($id);
        return view('admin.user.edit', compact('data'));
    }
    public function user_delete($id)
    {
        if (Auth::user()->id == $id) {
            Session::flash('error', 'Tidak bisa di hapus, karena sedang digunakan');
            return back();
        } else {
            $data = User::find($id)->delete();
            Session::flash('success', 'Berhasil Dihapus');
            return back();
        }
    }
    public function user_store(Request $req)
    {
        $checkUser = User::where('username', $req->username)->first();
        $role = Role::where('name', 'superadmin')->first();
        if ($checkUser == null) {
            if ($req->password1 != $req->password2) {
                Session::flash('error', 'Password Tidak Sama');
                return back();
            } else {

                $n = new User();
                $n->name = $req->name;
                $n->username = $req->username;
                $n->password = bcrypt($req->password1);
                $n->save();

                $n->roles()->attach($role);
                Session::flash('success', 'Berhasil Disimpan, Password : ' . $req->password1);
                return redirect('/superadmin/user');
            }
        } else {
            Session::flash('error', 'Username ini sudah pernah di input');
            return back();
        }
    }
    public function user_update(Request $req, $id)
    {
        $data = User::find($id);
        if ($req->password1 == null) {
            //update tanpa password
            $data->name = $req->name;
            $data->save();
            Session::flash('success', 'Berhasil Diupdate');
            return redirect('/superadmin/user');
        } else {
            // update beserta password
            if ($req->password1 != $req->password2) {
                Session::flash('error', 'Password Tidak Sama');
                return back();
            } else {
                $data->password = bcrypt($req->password1);
                $data->name = $req->name;
                $data->save();
                Session::flash('success', 'Berhasil Diupdate, password : ' . $req->password1);
                return redirect('/superadmin/user');
            }
        }
    }

    public function kategori()
    {
        $data = Kategori::orderBy('id', 'DESC')->paginate(15);
        return view('admin.kategori.index', compact('data'));
    }
    public function kategori_create()
    {
        return view('admin.kategori.create');
    }
    public function kategori_edit($id)
    {
        $data = Kategori::find($id);
        return view('admin.kategori.edit', compact('data'));
    }
    public function kategori_delete($id)
    {
        $data = Kategori::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function kategori_store(Request $req)
    {
        $check = Kategori::where('nama', $req->nama)->first();
        if ($check == null) {
            $n = new Kategori();
            $n->nama = $req->nama;
            $n->save();

            Session::flash('success', 'Berhasil Disimpan');
            return redirect('/superadmin/kategori');
        } else {
            Session::flash('error', 'Kategori ini sudah pernah di input');
            return back();
        }
    }
    public function kategori_update(Request $req, $id)
    {
        $data = Kategori::find($id);
        $data->nama = $req->nama;
        $data->save();
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/kategori');
    }


    public function kasi()
    {
        $data = Kasi::orderBy('id', 'DESC')->paginate(15);
        return view('admin.kasi.index', compact('data'));
    }
    public function kasi_create()
    {
        return view('admin.kasi.create');
    }
    public function kasi_edit($id)
    {
        $data = Kasi::find($id);
        return view('admin.kasi.edit', compact('data'));
    }
    public function kasi_delete($id)
    {
        $data = Kasi::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function kasi_store(Request $req)
    {
        Kasi::create($req->all());
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/kasi');
    }
    public function kasi_update(Request $req, $id)
    {
        Kasi::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/kasi');
    }

    public function kepala()
    {
        $data = Kepala::orderBy('id', 'DESC')->paginate(15);
        return view('admin.kepala.index', compact('data'));
    }
    public function kepala_create()
    {
        return view('admin.kepala.create');
    }
    public function kepala_edit($id)
    {
        $data = Kepala::find($id);
        return view('admin.kepala.edit', compact('data'));
    }
    public function kepala_delete($id)
    {
        $data = Kepala::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function kepala_store(Request $req)
    {
        Kepala::create($req->all());
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/kepala');
    }
    public function kepala_update(Request $req, $id)
    {
        Kepala::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/kepala');
    }


    public function penyedia()
    {
        $data = Penyedia::orderBy('id', 'DESC')->paginate(15);
        return view('admin.penyedia.index', compact('data'));
    }
    public function penyedia_create()
    {
        return view('admin.penyedia.create');
    }
    public function penyedia_edit($id)
    {
        $data = Penyedia::find($id);
        return view('admin.penyedia.edit', compact('data'));
    }
    public function penyedia_delete($id)
    {
        $data = Penyedia::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function penyedia_store(Request $req)
    {
        Penyedia::create($req->all());
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/penyedia');
    }
    public function penyedia_update(Request $req, $id)
    {
        Penyedia::find($id)->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/penyedia');
    }

    public function arsip()
    {
        $data = Arsip::orderBy('id', 'DESC')->paginate(15);
        return view('admin.arsip.index', compact('data'));
    }
    public function arsip_create()
    {
        $penyedia = Penyedia::get();
        $kasi = Kasi::get();
        $kategori = Kategori::get();
        $kepala = Kepala::get();

        if (Arsip::count() == 0) {
            $no_file = 1;
        } else {
            $no_file = Arsip::latest()->first()->id + 1;
        }

        return view('admin.arsip.create', compact('penyedia', 'kasi', 'kategori', 'kepala', 'no_file'));
    }
    public function arsip_edit($id)
    {
        $penyedia = Penyedia::get();
        $kasi = Kasi::get();
        $kategori = Kategori::get();
        $kepala = Kepala::get();
        $data = Arsip::find($id);
        return view('admin.arsip.edit', compact('data', 'penyedia', 'kasi', 'kategori', 'kepala'));
    }
    public function arsip_delete($id)
    {
        $data = Arsip::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function arsip_store(Request $req)
    {

        $filename = time() . '_' . $req->file->getClientOriginalName();

        if ($req->hasFile('file')) {
            $req->file->storeAs('/public/upload/', $filename);
        }
        $param = $req->all();
        $param['file'] = $filename;
        Arsip::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/arsip');
    }
    public function arsip_update(Request $req, $id)
    {

        $data = Arsip::find($id);
        if ($req->hasFile('file')) {
            $filename = time() . '_' . $req->file->getClientOriginalName();
            $req->file->storeAs('/public/upload/', $filename);
        } else {
            $filename = $data->file;
        }
        $param = $req->all();
        $param['file'] = $filename;
        $data->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/arsip');
    }

    public function laporan()
    {
        return view('admin.laporan.index');
    }

    public function lap_penyedia()
    {
        $data = Penyedia::get();
        return view('admin.laporan.lap_penyedia', compact('data'));
    }
    public function lap_kasi()
    {
        $data = Kasi::get();
        return view('admin.laporan.lap_kasi', compact('data'));
    }
    public function lap_kepala()
    {
        $data = Kepala::get();
        return view('admin.laporan.lap_kepala', compact('data'));
    }
    public function lap_arsip()
    {
        $data = Arsip::get()->sortBy('tanggal');
        return view('admin.laporan.lap_arsip', compact('data'));
    }
}
