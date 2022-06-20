<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use PDF;
// use Illuminate\Http\Response;
use Response;

class frontController extends Controller
{
    public function index(){
        return view('main');
    }

    public function pendaftaran(Request $request){
        $data = $request->session()->all();
  
        return view('pengguna.pendaftaran');
    }
    public function addpendaftaran(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi ! ',
            'max' => 'Kolom :attribute harus diisi maksimal :max karakter !'
        ];
        
        $this->validate($request,[
            'id_pengguna' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'tempat' => 'required',
            'tanggal_lahir' => 'required',
            'usia' => 'required|max:3',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'perusahaan' => 'required',
            'nohp' => 'required|max:13',
            'agama' => 'required',
            'nama_keluarga' => 'required',
            'pekerjaan_keluarga' => 'required',
            'jenis_pelayanan' => 'required'
        ], $message);

        $convert = Carbon::createFromFormat('m/d/Y', $request->tanggal_lahir)->format('Y-m-d');
    
        \App\pendaftaran::create([
            'id_pengguna' => $request->id_pengguna,
            'nama_lengkap'=> $request->nama, 
            'jenis_kelamin'=> $request->jenis_kelamin,
            'status'=> $request->status,
            'tempat'=> $request->tempat,
            'tanggal_lahir'=> $convert,
            'umur'=> $request->usia,
            'alamat'=> $request->alamat,
            'pekerjaan'=> $request->pekerjaan,
            'perusahaan'=> $request->perusahaan,
            'no_hp'=> $request->nohp,
            'agama'=> $request->agama,
            'nama_keluarga'=> $request->nama_keluarga,
            'pekerjaan_keluarga'=> $request->pekerjaan_keluarga,
            'jenis_pendaftaran'=> $request->jenis_pelayanan
        ]);

        $daftar = \App\pendaftaran::latest('id_pendaftaran')->first();
        $id = $daftar->id_pendaftaran;
        
        
        if ($request->jenis_pelayanan == "berobat"){
            
            $request->session()->put('id_pendaftaran', $id); 

            return redirect('berobat')->with('msg', 'Data Berhasil Ditambah');
        }else if ($request->jenis_pelayanan == "swab"){
           
            $request->session()->put('id_pendaftaran', $id); 

            return redirect('swab')->with('msg', 'Data Berhasil Ditambah');
        }else{
            return redirect('pengguna.pendaftaran');
        }
    }

    public function swab(Request $request){
        $data = $request->session()->all();
        
        return view('pengguna.swab');
    }
    public function addswab(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi ! '
        ];
        
        $this->validate($request,[
            'tanggal_swab' => 'required'
        ], $message);

        $data = $request->session()->get('id_pendaftaran');
        $convert = Carbon::createFromFormat('m/d/Y', $request->tanggal_swab)->format('Y-m-d');

        $tabel = 'swabs';
        $config = [
            'table' => $tabel,
            'length' => 4,
            'prefix' => 'S'
        ];

        $id = IdGenerator::generate($config);

        \App\swab::create([
            'id_pendaftaran' => $data,
            'tanggal_swab' => $convert,
            'kode_pendaftaran' => $id,
        ]);

        return redirect('kodeswab');
    }
 

    public function kodeswab(Request $request){
        $data = $request->session()->get('id_pendaftaran');
        $kode = \App\swab::select('kode_pendaftaran')
        ->where('id_pendaftaran', '=', $data)
        ->first();

        return view('pengguna.kodeswab', compact('kode'));
    }

    public function downloadkodeswab(Request $request){
        $data = $request->session()->get('id_pendaftaran');
        $kodes = \App\swab::select('kode_pendaftaran')
        ->where('id_pendaftaran', '=', $data)
        ->first();

        $pdf = PDF::loadview('pengguna.pdfswab', ['kode'=>$kodes]);
      
        return $pdf->download('download-kode-swab.pdf');

        $request->session()->forget('id_pendaftaran');
       
    }
    public function pdfswab(){
        return view('pengguna.pdfswab');
    }

    public function berobat(Request $request){
        $data = $request->session()->all();
        
        $dp = \App\poli::all();

        return view('pengguna.berobat', compact('dp'));
    }

    public function datapoli($id){
        
        $cek = \App\poli::where('id_poli', $id)->pluck('jadwal_poli');
      
        return Response::json(['success'=>true, 'info'=>$cek]);
    }

    public function addberobat(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi ! '
        ];
        
        $this->validate($request,[
            'poli' => 'required',
            'tanggal' => 'required'
        ], $message);

        
        $data = $request->session()->get('id_pendaftaran');
        $convert = Carbon::createFromFormat('m/d/Y', $request->tanggal)->format('Y-m-d');

        $tabel = 'berobats';
        $config = [
            'table' => $tabel,
            'length' => 4,
            'prefix' => 'B'
        ];

        $id = IdGenerator::generate($config);
        
        \App\berobat::create([
            'id_pendaftaran' => $data,
            'id_poli' => $request->poli,
            'tanggal' => $convert,
            'kode_pendaftaran' => $id,
        ]);

        return redirect('kodeberobat');
    }
    
    public function kodeberobat(Request $request){
        $data = $request->session()->get('id_pendaftaran');
        $kode = \App\berobat::select('kode_pendaftaran')
        ->where('id_pendaftaran', '=', $data)
        ->first();

        return view('pengguna.kodeberobat', compact('kode'));
    }

     public function downloadkodeberobat(Request $request){
        $data = $request->session()->get('id_pendaftaran');
        $kodes = \App\berobat::select('kode_pendaftaran')
            ->where('id_pendaftaran', '=', $data)
        ->first();

        $pdf = PDF::loadview('pengguna.pdfberobat', ['kode'=>$kodes]);
      
        return $pdf->download('download-kode-berobat.pdf');

        $request->session()->forget('id_pendaftaran');
       
    }
    public function pdfberobat(){
        return view('pengguna.pdfberobat');
    }


    public function kritiksaran(){
   
        return view('pengguna.kritiksaran');
    }   

    public function addkritiksaran(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi ! '
        ];
        
        $this->validate($request,[
            'kritik'=> 'required',
            'saran'=> 'required'
        ], $message);

        \App\kritiksaran::create([
            'id_pengguna' => $request->id_pengguna,
            'kritik'=> $request->kritik,
            'saran'=> $request->saran
        ]);

        return redirect('kritiksaran')->with('msg', 'Kritik Berhasil Ditambah');
    }
    
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('login');
    }

    public function datadiri(Request $request){
        $data = $request->session()->get('id_pengguna');

        $datadiri = \App\datadiri::select("*")
        ->where('id_pengguna', '=', $data)
        ->get();
       
        return view('pengguna.datadiri', compact('datadiri'));   
    }

    public function adddiri(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !',
            'max' => 'Kolom :attribute Harus diisi maksimal :max karakter !',
            'email' => 'Kolom :attribute Harus Diisi Email!'
        ];
        
        $this->validate($request,[
            'nama'  => 'required',
            'tempat'  => 'required' ,
            'tanggal_lahir' => 'required',
            'jenis_kelamin' =>  'required',
            'nohp' =>  'required|max:13',
            'email' => 'required|email' ,
            'alamat' => 'required'
        ], $message);
        
        $convert = Carbon::createFromFormat('m/d/Y', $request->tanggal_lahir)->format('Y-m-d');
        
        \App\datadiri::create([
            'id_pengguna' => $request->id_pengguna,
            'nama_lengkap' => $request->nama,
            'tempat' => $request->tempat,
            'tanggal_lahir' => $convert,
            'jeniskelamin' => $request->jenis_kelamin,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);
        return redirect('datadiri')->with('msg', 'Data Berhasil Ditambah');
    }
    
    public function editdiri(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi !',
            'max' => 'Kolom :attribute Harus diisi maksimal :max karakter !',
            'email' => 'Kolom :attribute Harus Diisi Email!'
        ];
        
        $this->validate($request,[
            'nama'  => 'required',
            'tempat'  => 'required' ,
            'tanggal' => 'required',
            'jenis_kelamin' =>  'required',
            'nohp' =>  'required|max:13',
            'email' => 'required|email' ,
            'alamat' => 'required'
        ], $message);

         \App\datadiri::where('id_diri', $request->id_diri)
        ->update([
            'id_pengguna' => $request->id_pengguna,
            'nama_lengkap' => $request->nama,
            'tempat' => $request->tempat,
            'tanggal_lahir' => $request->tanggal,
            'jeniskelamin' => $request->jenis_kelamin,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);
        return redirect('datadiri')->with('msg', 'Data Berhasil Diubah');
    }

    public function hasiltest(Request $request){
        $data = $request->session()->get('id_pengguna');

         $dp = \App\pendaftaran::select('id_pendaftaran' , 'nama_lengkap')
        ->where('jenis_pendaftaran', '=', 'swab')
        ->get();

        // dd($data);
        $hasiltest = \App\hasiltest::select('id_hasil', 'nama_file')  
        ->where('id_pengguna', '=', $data)
        ->get();
        
        return view('pengguna.hasiltest', compact('hasiltest'));
    }

    public function viewhasil($id){
        $view = \App\hasiltest::select('id_hasil','nama_file')
        ->where('id_hasil', '=', $id)
        ->first();

        return view('pengguna.viewhasil', compact('view'));
    }

    public function download($file){
        return response()->download('storage/data_file/'.$file);
    }

    public function login(){
        return view('login');
    }
    public function aksiloginpasien(Request $request){
        try{
            $data = \App\pengguna::where('username', $request->username, 'password')->firstOrFail();
            if($data){
                if(Hash::check($request->password, $data->password)){
                    $getid = $data->id_pengguna;
                    session(['berhasil_login'=> true]);
                    $request->session()->put('id_pengguna', $getid);      
                    return redirect('/pendaftaran')->with('msg', 'Selamat Datang');
                }else{  
                    return redirect()->back()->with('errors', 'Username atau Password Salah');
                }
            }
        }catch (ModelNotFoundException $e){
            return redirect()->back()->with('errors', 'Username atau Password Harap diisi dengan benar');
        }     
    }

    public function registrasi(){
        return view('regist');
    }
    public function addpengguna(Request $request){
        $message = [
            'required' => 'Kolom :attribute Harus Diisi ! '
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

        return redirect('login')->with('msg', 'Data Berhasil Ditambah');
    }

    
}
