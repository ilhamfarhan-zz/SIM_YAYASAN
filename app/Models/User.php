<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'npp', //baru
        'level', //baru'
        'password',
        'name',
        'jabatan',
        'status',
        'tanggal_masuk',
        'nama_sekolah',
        'npsn',
        'alamat_sekolah',
        'nama_lengkap',
        'jk',
        'tgl_lahir',
        'ttl',
        'nama_ibu',
        'alamat_lengkap',
        'lintang',
        'bujur',
        'kk',
        'kode_pos',
        'agama',
        'npwp',
        'nama_pajak',
        'kewarganegaraan',
        'nama_negara',
        'kawin',
        'nama_pasangan',
        'nip_pasangan',
        'pekerjaan_pasangan',
        'niy',
        'nik',
        'nuptk',
        'sumber_gaji',
        'kartu_pegawai',
        'kartu_pasangan',
        'nomor_rumah',
        'nomor_hp',
        'email',
        'keluar',
        'tanggal_keluar',
        'status_user',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    }
}
