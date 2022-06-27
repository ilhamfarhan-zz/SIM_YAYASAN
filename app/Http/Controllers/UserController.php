<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\User;
use DateTime;
use DateTimeZone;

class UserController extends Controller
{
    public function index()
    {
        $posts = Absen::with('user')->get();
        return view('pegawai.index', ['posts' => $posts]);
    }
    public function user()
    {
        $aktif = User::where('status' ,"!=",'admin')->count();
        $keluar = User::where('status_user','Keluar')->count();
        $total = User::where('level', '!=', 'admin')->count();
        $users = User::where('level', '!=', 'admin')->latest()->paginate(0);
        return view('admin.pegawai.index',compact('users','aktif','keluar','total'))
            ->with('i');
    }
    public function create()
    {
        return view('admin.pegawai.create');
    }
    public function store(Request $request)
    {
    	$validate = $request->validate([
        'npp' => 'nullable', //baru
        'level' => 'nullable', //baru'
        'password' => 'nullable',
        'name' => 'nullable',
        'jabatan' => 'nullable',
        'status' => 'nullable',
        'tanggal_masuk' => 'nullable',
        'nama_sekolah' => 'nullable',
        'npsn' => 'nullable',
        'alamat_sekolah' => 'nullable',
        'nama_lengkap' => 'nullable',
        'jk' => 'nullable',
        'tgl_lahir' => 'nullable',
        'ttl' => 'nullable',
        'nama_ibu' => 'nullable',
        'alamat_lengkap' => 'nullable',
        'lintang' => 'nullable',
        'bujur' => 'nullable',
        'kk' => 'nullable',
        'kode_pos' => 'nullable',
        'agama' => 'nullable',
        'npwp' => 'nullable',
        'nama_pajak' => 'nullable',
        'kewarganegaraan' => 'nullable',
        'nama_negara' => 'nullable',
        'kawin' => 'nullable',
        'nama_pasangan' => 'nullable',
        'nip_pasangan' => 'nullable',
        'nik' => 'nullable',
        'pekerjaan_pasangan' => 'nullable',
        'niy' => 'nullable',
        'nuptk' => 'nullable',
        'sumber_gaji' => 'nullable',
        'kartu_pegawai' => 'nullable',
        'kartu_pasangan' => 'nullable',
        'nomor_rumah' => 'nullable',
        'nomor_hp' => 'nullable',
        'email' => 'nullable',
        'status_user' =>'nullable',
    	]);

        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('d-m-Y');
        $validate['tanggal_masuk'] = $tanggal;
        
       	$password = bcrypt($request->password);
       	$validate['password'] = $password;
       	$validate['level'] = 'user';
        $validate['status_user'] = 'Aktif';
        
       	$user = User::create($validate);

        if ($user) {
            return redirect()
                ->route('p_admin')
                ->with([
                    'success' => 'Data Pegawai Baru Telah Berhasil Di Simpan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Ada Kesalahan Dalam Penginputan,Silahkan Coba Lagi'
                ]);
        }
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pegawai.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'npp' => 'nullable', //baru
        'level' => 'nullable', //baru'
        'password' => 'nullable',
        'name' => 'nullable',
        'jabatan' => 'nullable',
        'status' => 'nullable',
        'tanggal_masuk' => 'nullable',
        'nama_sekolah' => 'nullable',
        'npsn' => 'nullable',
        'alamat_sekolah' => 'nullable',
        'nama_lengkap' => 'nullable',
        'jk' => 'nullable',
        'tgl_lahir' => 'nullable',
        'ttl' => 'nullable',
        'nama_ibu' => 'nullable',
        'alamat_lengkap' => 'nullable',
        'lintang' => 'nullable',
        'bujur' => 'nullable',
        'kk' => 'nullable',
        'kode_pos' => 'nullable',
        'agama' => 'nullable',
        'npwp' => 'nullable',
        'nama_pajak' => 'nullable',
        'kewarganegaraan' => 'nullable',
        'nama_negara' => 'nullable',
        'kawin' => 'nullable',
        'nama_pasangan' => 'nullable',
        'nip_pasangan' => 'nullable',
        'nik' => 'nullable',
        'pekerjaan_pasangan' => 'nullable',
        'niy' => 'nullable',
        'nuptk' => 'nullable',
        'sumber_gaji' => 'nullable',
        'kartu_pegawai' => 'nullable',
        'kartu_pasangan' => 'nullable',
        'nomor_rumah' => 'nullable',
        'nomor_hp' => 'nullable',
        'email' => 'nullable',
        'keluar' => 'nullable',
        'tanggal_keluar' => 'nullable',
        'status_user' => 'nullable',
        ]);

        $user = User::findOrFail($id);
        $level = 'user';
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('d-m-Y');
    

        $user->update([
            'npp' => $request->npp,
            'level' => $request->level,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'tanggal_masuk' => $tanggal,
            'nama_sekolah' => $request->nama_sekolah,
            'npsn' => $request->npsn,
            'alamat_sekolah' => $request->alamat_sekolah,
            'nama_lengkap' => $request->nama_lengkap,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'ttl' => $request->ttl,
            'nama_ibu' => $request->nama_ibu,
            'alamat_lengkap' => $request->alamat_lengkap,
            'lintang' => $request->lintang,
            'bujur' => $request->bujur,
            'kk' => $request->kk,
            'kode_pos' => $request->kode_pos,
            'agama' => $request->agama,
            'npwp' => $request->npwp,
            'nama_pajak' => $request->nama_pajak,
            'kewarganegaraan' => $request->kewarganegaraan,
            'nama_negara' => $request->nama_negara,
            'kawin' => $request->kawin,
            'nama_pasangan' => $request->nama_pasangan,
            'nip_pasangan' => $request->nip_pasangan,
            'nik' => $request->nik,
            'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
            'niy' => $request->niy,
            'nuptk' => $request->nuptk,
            'sumber_gaji' => $request->sumber_gaji,
            'kartu_pegawai' => $request->kartu_pegawai,
            'kartu_pasangan' => $request->kartu_pasangan,
            'nomor_rumah' => $request->nomor_rumah,
            'nomor_hp' => $request->nomor_hp,
            'email' => $request->email,
            'keluar' => $request->keluar,
            'tanggal_keluar' => $request->tanggal_keluar,
            'level' => $level,
            'status_user' => $request->status_user,
        ]);

        if ($user) {
            return redirect()
                ->route('p_admin')
                ->with([
                    'success' => 'Data Pegawai Terlah Berhasil Di Rubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Ada Kesalahan Dalam Penginputan,Silahkan Coba Lagi'
                ]);
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if ($user) {
            return redirect()
                ->route('p_admin')
                ->with([
                    'destroy' => 'Data Pegawai Telah Berhasil Di Hapus'
                ]);
        } else {
            return redirect()
                ->route('p_admin')
                ->with([
                    'error' => 'Ada Kesalahan Dalam Penginputan,Silahkan Coba Lagi'
                ]);
        }
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $tetap = User::where('status','tetap')->count();
        $magang = User::where('status','magang')->count();
        $total = User::where('level', '!=', 'admin')->count();
        $users = User::where('npp', "%" . $keyword . "%")->paginate(0);
        return view('admin.pegawai.index', compact('users','tetap','magang','total'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
}