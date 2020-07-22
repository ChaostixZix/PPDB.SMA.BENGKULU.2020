<?php

namespace App\Pendaftar\SMA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PindahTugas extends Model
{
    private function db()
    {
        return DB::table('daftar_pindahtugas');
    }

    public function getPendaftarBySekolah($sma_id)
    {
        $select =
            [
                'daftar_pindahtugas.id',
                'daftar_pindahtugas.nopes',
                'daftar_pindahtugas.pilihan',
                'daftar_pindahtugas.status',
                'daftar_pindahtugas.waktu',

                'data_siswa.nisn',
                'data_siswa.no_induk',
                'data_siswa.nm_pes',
                'data_siswa.tmp_lhr',
                'data_siswa.tgl_long',
                'data_siswa.sex',
                'data_siswa.nm_ortu',
                'data_siswa.asal_smp',
                'data_siswa.alamat_1',
                'data_siswa.koordinat',
                'data_siswa.url_foto',
                'data_siswa.kota',
                'data_siswa.kecamatan',
                'data_siswa.kelurahan',
                'data_siswa.lock',

            ];
        return $this->db()->where(['daftar_pindahtugas.lock' => 1, 'daftar_pindahtugas.pilihan' => $sma_id])
            ->select($select)
            ->leftJoin('data_siswa', 'data_siswa.nopes', '=', 'daftar_pindahtugas.nopes')
            ->get();
    }
}
