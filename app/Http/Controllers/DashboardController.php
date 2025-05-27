<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;
use App\Models\PKL;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $aktivitas = [];

        // Ambil data terbaru
        $siswas = Siswa::latest()->take(5)->get();
        foreach ($siswas as $siswa) {
            $aktivitas[] = [
                'nama' => $siswa->nama,
                'kegiatan' => 'Menambahkan data siswa',
                'tanggal' => $siswa->created_at,
            ];
        }

        $gurus = Guru::latest()->take(5)->get();
        foreach ($gurus as $guru) {
            $aktivitas[] = [
                'nama' => $guru->nama,
                'kegiatan' => 'Menambahkan data guru',
                'tanggal' => $guru->created_at,
            ];
        }

        $industris = Industri::latest()->take(5)->get();
        foreach ($industris as $industri) {
            $aktivitas[] = [
                'nama' => $industri->nama,
                'kegiatan' => 'Menambahkan data industri',
                'tanggal' => $industri->created_at,
            ];
        }

        $pkls = PKL::latest()->take(5)->get();
        foreach ($pkls as $pkl) {
            $aktivitas[] = [
                'nama' => optional($pkl->siswa)->nama ?? 'Siswa tidak ditemukan',
                'kegiatan' => 'Update status PKL',
                'tanggal' => $pkl->updated_at,
            ];
        }

        // Urutkan berdasarkan tanggal terbaru
        usort($aktivitas, function ($a, $b) {
            return strtotime($b['tanggal']) - strtotime($a['tanggal']);
        });

        return view('dashboard', compact('aktivitas'));
    }
}
