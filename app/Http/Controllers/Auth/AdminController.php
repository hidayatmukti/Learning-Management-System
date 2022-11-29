<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Hash;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(Request $request){
        $users = DB::select('select * from pengumuman');
        return view('admin/home', ['title' => 'PENGUMUMAN','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'ada'=>array(),'tidak'=>array()]);
    }
    public function add_user(Request $request){
        DB::insert('INSERT INTO users (email,name,password,role) VALUES(?,?,?,2)',[$request->email,$request->name,Hash::make($request->password)]);
        return redirect(route('admin'));
    }
    public function delete_user(Request $request){
        DB::delete('DELETE FROM users WHERE id=?',[$request->del]);
        return redirect(route('admin'));
    }
    public function edit_user(Request $request){
        DB::update('UPDATE users SET email=?,name=?,password=? WHERE id=?' ,[$request->email,$request->name,Hash::make($request->password),$request->del]);
        return redirect(route('admin'));
    }
    
    public function matkul(Request $request){
        $users = DB::select('select * from matkul');
        return view('admin/matkul', ['title' => 'MATA KULIAH','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users]);
    }
    public function add_matkul(Request $request){
        DB::insert('INSERT INTO matkul (nama) VALUES(?)',[$request->name]);
        return redirect(route('matkul'));
    }
    public function delete_matkul(Request $request){
        DB::delete('DELETE FROM matkul WHERE id=?',[$request->del]);
        return redirect(route('matkul'));
    }
    public function edit_matkul(Request $request){
        DB::update('UPDATE matkul SET nama=? WHERE id=?' ,[$request->name,$request->del]);
        return redirect(route('matkul'));
    }
    
    
    public function pengumuman(Request $request){
        $users = DB::select('select * from pengumuman');
        return view('admin/pengumuman', ['title' => 'PENGUMUMAN','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users]);
    }
    public function add_pengumuman(Request $request){
        DB::insert('INSERT INTO pengumuman (nama,deskripsi) VALUES(?,?)',[$request->name,$request->deskripsi]);
        return redirect(route('pengumuman'));
    }
    public function delete_pengumuman(Request $request){
        DB::delete('DELETE FROM pengumuman WHERE id=?',[$request->del]);
        return redirect(route('pengumuman'));
    }
    public function edit_pengumuman(Request $request){
        DB::update('UPDATE pengumuman SET nama=?,deskripsi=? WHERE id=?' ,[$request->name,$request->deskripsi,$request->del]);
        return redirect(route('pengumuman'));
    }
    
    public function ujian(Request $request){
        $users = DB::select('select ujian.id AS id,matkul.nama AS nama_matkul,ujian.nama AS nama_ujian, ujian.tanggal AS tanggal,ujian.durasi AS durasi from ujian JOIN matkul ON ujian.id_matkul = matkul.id');
        $user = DB::select('select * from matkul');
        return view('admin/ujian', ['title' => 'UJIAN','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'data' => $user]);
    }
    public function add_ujian(Request $request){
        DB::insert('INSERT INTO ujian (nama,id_matkul,tanggal,durasi) VALUES(?,?,?,?)',[$request->nama,$request->id_matkul,$request->tanggal,$request->durasi]);
        return redirect(route('ujian'));
    }
    public function delete_ujian(Request $request){
      
        DB::delete('DELETE FROM soal_pg WHERE id_ujian=?',[$request->del]);
        DB::delete('DELETE FROM soal_isian WHERE id_ujian=?',[$request->del]);
        DB::delete('DELETE FROM ujian WHERE id=?',[$request->del]);
        return redirect(route('ujian'));
    }
    public function edit_ujian(Request $request){
        DB::UPDATE('UPDATE ujian SET nama=? ,id_matkul=?,tanggal=?,durasi=? WHERE id=?',[$request->nama,$request->id_matkul,$request->tanggal,$request->durasi,$request->del]);
        return redirect(route('ujian'));
    }
    
    public function soal(Request $request){
        $users = DB::select('select soal_pg.id AS id,soal_pg.no,soal_pg.soal,soal_pg.a,soal_pg.b,soal_pg.c,soal_pg.d,soal_pg.jawaban, ujian.nama AS nama_ujian from ujian JOIN soal_pg ON soal_pg.id_ujian = ujian.id');
        $u = DB::select('select soal_isian.id AS id,soal_isian.no,soal_isian.soal, ujian.nama AS nama_ujian from ujian JOIN soal_isian ON soal_isian.id_ujian = ujian.id');
        $user = DB::select('select * from ujian');
        return view('admin/soal', ['title' => 'SOAL','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'datas' => $u,'data' => $user]);
    }
    public function add_soal_pg(Request $request){
       $a = DB::select("SELECT COUNT(*) as jumlah FROM soal_pg WHERE id_ujian=?",[$request->id_ujian]);
       $b = DB::select("SELECT COUNT(*) as jumlah FROM soal_isian WHERE id_ujian=?",[$request->id_ujian]);
       $c = $a[0]->jumlah + $b[0]->jumlah+1;
       print_r($c);
        DB::insert('INSERT INTO soal_pg (no,soal,a,b,c,d,jawaban,id_ujian) VALUES(?,?,?,?,?,?,?,?)',[$c,$request->soal,$request->a,$request->b,$request->c,$request->d,$request->jawaban,$request->id_ujian]);
        return redirect(route('soal'));
    }
    public function delete_soal_pg(Request $request){
      
        DB::delete('DELETE FROM soal_pg WHERE id=?',[$request->del]);
        return redirect(route('soal'));
    }
    public function edit_soal_pg(Request $request){
        DB::UPDATE('UPDATE soal_pg SET soal=?,a=?,b=?,c=?,d=?,jawaban=?,id_ujian=? WHERE id=?',[$request->soal,$request->a,$request->b,$request->c,$request->d,$request->jawaban,$request->id_ujian,$request->del]);
        return redirect(route('soal'));
    }
    public function add_soal_isian(Request $request){
       $a = DB::select("SELECT COUNT(*) as jumlah FROM soal_pg WHERE id_ujian=?",[$request->id_ujian]);
       $b = DB::select("SELECT COUNT(*) as jumlah FROM soal_isian WHERE id_ujian=?",[$request->id_ujian]);
       $c = $a[0]->jumlah + $b[0]->jumlah+1;
       print_r($c);
        DB::insert('INSERT INTO soal_isian (no,soal,id_ujian) VALUES(?,?,?)',[$c,$request->soal,$request->id_ujian]);
        return redirect(route('soal'));
    }
    public function delete_soal_isian(Request $request){
      
        DB::delete('DELETE FROM soal_isian WHERE id=?',[$request->del]);
        return redirect(route('soal'));
    }
    public function edit_soal_isian(Request $request){
        DB::UPDATE('UPDATE soal_isian SET soal=?,id_ujian=? WHERE id=?',[$request->soal,$request->id_ujian,$request->del]);
        return redirect(route('soal'));
    }
    
    
    public function tugas(Request $request){
        $users = DB::select('select tugas.id AS id,matkul.nama AS nama_matkul,tugas.nama AS nama_tugas, tugas.soal AS soal from tugas JOIN matkul ON tugas.id_matkul = matkul.id');
        $user = DB::select('select * from matkul');
        return view('admin/tugas', ['title' => 'TUGAS','name' => $request->session()->get('name'),'role' => $request->session()->get('role'),'data_user' => $users,'data' => $user]);
    }
    public function add_tugas(Request $request){
        $file = $request->file('soal');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        DB::insert('INSERT INTO tugas (nama,id_matkul,soal) VALUES(?,?,?)',[$request->nama,$request->id_matkul,$file->getClientOriginalName()]);
        return redirect(route('tugas'));
    }
    public function delete_tugas(Request $request){
        DB::delete('DELETE FROM tugas WHERE id=?',[$request->del]);
        return redirect(route('tugas'));
    }
    public function edit_tugas(Request $request){
        $file = $request->file('soal');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        DB::UPDATE('UPDATE tugas SET nama=? ,id_matkul=?,soal=? WHERE id=?',[$request->nama,$request->id_matkul,$file->getClientOriginalName(),$request->del]);
        return redirect(route('tugas'));
    }
    
}
