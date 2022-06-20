<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class backController extends Controller
{
    public function index(){
        return view('admin.admin');
    }

    // ADMIN
    public function dataadmin(){
        $tampiladmin = \App\admin::all();
        return view ('admin.dataAdmin', ['admins' => $tampiladmin]);
    }
    public function addadmin(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !'
        ];
        
        $this->validate($request,[
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
        ], $message);

        $hash = Hash::make($request->password);
 
        \App\admin::create([
            'nama_admin' => $request->nama,
            'username' => $request->username,
            'password' => $hash 
        ]);
        return redirect('dataadmin')->with('msg', 'Data Berhasil Ditambah');
    }
    public function updateadmin(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !'
        ];
        
        $this->validate($request,[
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
        ], $message);
        
        $hash = Hash::make($request->password);

        \App\admin::where('id_admin', $request->id_admin)
        ->update([
            'nama_admin' => $request->nama,
            'username' => $request->username,
            'password' => $hash
        ]);
        return redirect('dataadmin')->with('msg', 'Data Berhasil Diubah');
    }
    public function hapusadmin($id){
        \App\admin::where('id_admin', $id)
        ->delete();
        return redirect('dataadmin')->with('msg', 'Data Berhasil Dihapus');
    }

    // PASIEN/PENGGUNA
    public function datapengguna(){
        $tampilpengguna = \App\pengguna::all();
        return view('admin.dataPengguna', ['penggunas' => $tampilpengguna]);
    }
    public function addpengguna(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !'
        ];
        
        $this->validate($request,[
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
        ], $message);

        $hash = Hash::make($request->password);

        \App\pengguna::create([
            'nama_pengguna' => $request->nama,
            'username' => $request->username,
            'password' => $hash
        ]);
        return redirect('datapengguna')->with('msg', 'Data Berhasil Ditambah');
    }
    public function updatepengguna(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !'
        ];
        
        $this->validate($request,[
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
        ], $message);
        
        $hash = Hash::make($request->password);
            
        \App\pengguna::where('id_pengguna', $request->id_pengguna)
        ->update([
            'nama_pengguna' => $request->nama,
            'username' => $request->username,
            'password' => $hash
        ]);
        return redirect('datapengguna')->with('msg', 'Data Berhasil Diubah');
    }
    public function hapuspengguna($id){
        \App\pengguna::where('id_pengguna', $id)
        ->delete();
        return redirect('datapengguna')->with('msg', 'Data Berhasil Dihapus');
    }

    // PENDAFTARAN
    public function datapendaftaran(){
        $tampilpendaftaran = \App\pendaftaran::all();
        return view('admin.dataPendaftaran', ['pendaftarans' => $tampilpendaftaran]);
    }
    public function updatependaftaran(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !',
            'max' => 'Kolom :attribute Harus diisi maksimal :max karakter !'
        ];
        
        $this->validate($request,[
            'nama' =>  'required',
            'jenis_kelamin' =>  'required',
            'status' => 'required',
            'tempat' => 'required',
            'tanggal_lahir' =>  'required',
            'umur' =>  'required|max:3',
            'alamat' =>  'required',
            'pekerjaan' =>  'required',
            'perusahaan' =>  'required',
            'nohp' =>  'required|max:13',
            'agama' =>  'required',
            'nama_keluarga' =>  'required',
            'pekerjaan_keluarga' =>  'required',
            'jenis_pendaftaran' =>  'required'
           
        ], $message);

        \App\pendaftaran::where('id_pendaftaran', $request->id_pendaftaran)
        ->update([
            'id_pengguna' => $request->id_pengguna,
            'nama_lengkap' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status,
            'tempat' => $request->tempat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'perusahaan' => $request->perusahaan,
            'no_hp' => $request->nohp,
            'agama' => $request->agama,
            'nama_keluarga' => $request->nama_keluarga,
            'pekerjaan_keluarga' => $request->pekerjaan_keluarga,
            'jenis_pendaftaran' => $request->jenis_pendaftaran
        ]);
        return redirect('datapendaftaran')->with('msg', 'Data Berhasil Diubah');
    }
    public function hapuspendaftaran($id){
        \App\pendaftaran::where('id_pendaftaran', $id)
        ->delete();
        return redirect('datapendaftaran')->with('msg', 'Data Berhasil Dihapus');
    }

     //HASIL TEST
    public function datahasiltest(){
       $hasiltest = \App\hasiltest::join('pendaftarans', 'pendaftarans.id_pendaftaran', '=', 'hasiltests.id_pendaftaran')
        ->get(['pendaftarans.nama_lengkap', 'hasiltests.id_hasil', 'hasiltests.id_pendaftaran', 'hasiltests.nama_file']);
        
        $dp = \App\pendaftaran::select('id_pengguna', 'id_pendaftaran', 'nama_lengkap')
        ->where('jenis_pendaftaran', '=', 'swab')
        ->get();
        
        return view('admin.dataHasiltest', compact('hasiltest'), compact('dp'));
    }
    public function addhasiltest(Request $request){
         $message = [
            'required' => 'Kolom :attribute Harus Diisi !',
            'max' => 'Ukuran file tidak lebih dari 10mb',
            'mimetypes' => 'Kolom :attribute harus dalam bentuk PDF !'
        ];
        
        $this->validate($request,[
            'nama_pasien' => 'required',
            'id_pendaftaran' => 'required',
            'nama_file' => 'required|mimetypes:application/pdf|max:10240'
        ], $message);

        \App\hasiltest::create([
            'id_pengguna' => $request->nama_pasien,
            'id_pendaftaran' => $request->id_pendaftaran,
            'nama_file' => $request->file('nama_file')->getClientOriginalName()
        ]);
        $request->file('nama_file')->storeAs('public/data_file', $request->file('nama_file')->getClientOriginalName());
        return redirect('datahasiltest')->with('msg', 'Data Berhasil Ditambah');
    }
    public function updatehasiltest(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !',
            'max' => 'Ukuran file tidak lebih dari 10mb',
            'mimetypes' => 'Kolom :attribute harus dalam bentuk PDF !'
        ];
        
        $this->validate($request,[
            'nama_file' => 'required|mimetypes:application/pdf|max:10240'
        ], $message);

        \App\hasiltest::where('id_hasil', $request->id_hasil)
        ->update([ 
            'id_pendaftaran' => $request->id_pendaftaran,
            'nama_file' => $request->file('nama_file')->getClientOriginalName()
        ]);
        $request->file('nama_file')->storeAs('public/data_file', $request->file('nama_file')->getClientOriginalName());
        return redirect('datahasiltest')->with('msg', 'Data Berhasil Diubah');
    }
    public function hapushasiltest($id){
        \App\hasiltest::where('id_hasil', $id)
        ->delete();
        return redirect('datahasiltest')->with('msg', 'Data Berhasil Dihapus');
    }

    //KRITIK SARAN  
    public function datakritiksaran(){
        $kritiksaran = \App\kritiksaran::all();

        return view('admin.dataKritiksaran', compact('kritiksaran'));
    }
   
    public function hapuskritik($id){
        \App\kritiksaran::where('id_kritik', $id)
        ->delete();
        return redirect('datakritiksaran')->with('msg', 'Data Berhasil Dihapus');
    }

    // BEROBAT
    public function databerobat(){
       $berobat = \App\berobat::join('pendaftarans', 'pendaftarans.id_pendaftaran', '=','berobats.id_pendaftaran')
        ->join('polis', 'polis.id_poli', '=', 'berobats.id_poli')
        ->get(['pendaftarans.nama_lengkap', 'polis.nama_poli' ,'berobats.id_pendaftaran', 'berobats.id_poli' ,'berobats.tanggal', 'berobats.tanggal', 'berobats.kode_pendaftaran']);
        
        return view('admin.dataBerobat', compact('berobat'));  
    }
    public function updateberobat(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !'
        ];
        
        $this->validate($request,[
            'tanggal' => 'required'
        ], $message);

        \App\berobat::where('kode_pendaftaran', $request->kode_pendaftaran)
        ->update([
            'id_pendaftaran' => $request->id_pendaftaran,
            'id_poli' => $request->id_poli,
            'tanggal' => $request->tanggal
        ]);
        return redirect('databerobat')->with('msg', 'Data Berhasil Diubah');
    }
    public function hapusberobat($id){
        \App\berobat::where('kode_pendaftaran', $id)
        ->delete();
        return redirect('databerobat')->with('msg', 'Data Berhasil Dihapus');
    }

    // SWAB
    public function dataswab(){
       $swab= \App\swab::join('pendaftarans', 'pendaftarans.id_pendaftaran', '=', 'swabs.id_pendaftaran')
        ->get(['pendaftarans.nama_lengkap', 'swabs.id_pendaftaran', 'swabs.tanggal_swab', 'swabs.kode_pendaftaran']);
        return view('admin.dataSwab', compact('swab'));
    }
    public function updateswab(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !'
        ];
        
        $this->validate($request,[
            'tanggal' => 'required'
        ], $message);

        \App\swab::where('kode_pendaftaran', $request->kode_pendaftaran)
        ->update([
            'id_pendaftaran' => $request->id_pendaftaran,
            'tanggal_swab' => $request->tanggal
        ]);
        return redirect('dataswab')->with('msg', 'Data Berhasil Diubah');
    }
    public function hapusswab($id){
        \App\swab::where('kode_pendaftaran', $id)
        ->delete();
        return redirect('dataswab')->with('msg', 'Data Berhasil Dihapus');
    }

    // POLI
    public function datapoli(){
        $tampilpoli= \App\poli::all();
        return view('admin.dataPoli', ['polis' => $tampilpoli]);
    }
    public function updatepoli(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !'
        ];
        
        $this->validate($request,[
            'nama_poli' => 'required',
            'jadwal' => 'required'
        ], $message);

        \App\poli::where('id_poli', $request->id_admin)
        ->update([
            'nama_poli' => $request->nama_poli,
            'jadwal_poli' => $request->jadwal
        ]);
        return redirect('datapoli')->with('msg', 'Data Berhasil Diubah');
    }
    public function hapuspoli($id){
        \App\poli::where('id_poli', $id)
        ->delete();
        return redirect('datapoli')->with('msg', 'Data Berhasil Dihapus');
    }


    public function blank(){
        return view('admin.blank');
    }

    // login admin
    public function loginadmin(){
        return view('admin.loginadmin');
    }
    public function aksiloginadmin(Request $request){
        try{
            $data = \App\admin::where('username', $request->username, 'password')->firstOrFail();
            if($data){
                if(Hash::check($request->password, $data->password)){
                    session(['admin_login'=> true]);    
                    return redirect('/datapendaftaran');
                }else{
                    return redirect()->back()->with('errors', 'Username atau Password Salah');
                }
            }
        }catch (ModelNotFoundException $e){
            return redirect()->back()->with('errors', 'Username atau Password Harap diisi dengan benar ');
        }     
     
    }
    public function logoutadmin(Request $request){   
        $request->session()->flush();
        return redirect('loginadmin');
    }
}
