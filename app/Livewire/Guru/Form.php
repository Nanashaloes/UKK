<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $id, $nama, $nip, $gender, $alamat, $kontak, $email, $foto;

    public function mount($id = null)
    {
        if ($id) {
            $guru = Guru::findOrFail($id);
            $this->id = $guru->id;
            $this->nama = $guru->nama;
            $this->nip = $guru->nip;
            $this->gender = $guru->gender;
            $this->alamat = $guru->alamat;
            $this->kontak = $guru->kontak;
            $this->email = $guru->email;
            $this->foto = $guru->foto; // isi path lama agar bisa ditampilkan
        }
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:guru,nip,' . $this->id,
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:guru,email,' . $this->id,
            'foto' => 'nullable|image|max:1024',
        ];
    }

    public function save()
    {
        $this->validate();

        if (is_object($this->foto)) {
            $path = $this->foto->store('foto-guru', 'public');
        } else {
            $path = $this->foto;
        }

        Guru::updateOrCreate(
            ['id' => $this->id],
            [
                'nama' => $this->nama,
                'nip' => $this->nip,
                'gender' => $this->gender,
                'alamat' => $this->alamat,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'foto' => $path,
            ]
        );

        session()->flash('message', 'Data guru berhasil disimpan.');
        return redirect()->route('guru');
    }

    public function render()
    {
        return view('livewire.guru.form');
    }
}
