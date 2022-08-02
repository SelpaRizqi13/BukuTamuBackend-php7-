<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\BukuTamu;
use App\Models\Instansi;
use App\Models\User;
use App\Models\Pegawai;

class GetDataController extends Controller
{
    public function userById($id)
    {
        $user = User::find($id);

        if ($user)
            return ResponseFormatter::success($user, 'Data user berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data user tidak ada', 404);
    }
    public function getJadwal()
    {
        $jadwals = Jadwal::all();
        if ($jadwals)
            return ResponseFormatter::success($jadwals, 'Data Jadwal berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data Jadwal tidak ada', 404);

        // return response()->json(['message'=>'Success', 'data'=> 'selpa']);
    }

    public function getJadwalById($id)
    {
        $jadwal = Jadwal::find($id);

        if ($jadwal)
            return ResponseFormatter::success($jadwal, 'Data Jadwal berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data Jadwal tidak ada', 404);
    }

    public function storeJadwal(Request $request)
    {
        $jadwal = Jadwal::create($request->all());
        if ($jadwal)
            return ResponseFormatter::success($jadwal, 'Data Jadwal berhasil ditambahkan');
        else
            return ResponseFormatter::error(null, 'Data Jadwal gagal ditambahkan', 404);
    }

    public function updateJadwal(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->update($request->all());
        if ($jadwal)
            return ResponseFormatter::success($jadwal, 'Data Jadwal berhasil diupdate');
        else
            return ResponseFormatter::error(null, 'Data Jadwal gagal diupdate', 404);
    }

    public function deleteJadwal($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        
        return ResponseFormatter::success(null, 'Data Jadwal berhasil diupdate');
        
    }

    // Data User 

    public function getUser()
    {
        $users = User::all();
        if ($users)
            return ResponseFormatter::success($users, 'Data User berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data User tidak ada', 404);

        // return response()->json(['message'=>'Success', 'data'=> 'selpa']);
    }

    public function getUserById($id)
    {
        $model = User::find($id);

        if ($model)
            return ResponseFormatter::success($model, 'Data User berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data User tidak ada', 404);
    }

    public function storeUser(Request $request)
    {
        $model = User::create($request->all());
        if ($model)
            return ResponseFormatter::success($model, 'Data user berhasil ditambahkan');
        else
            return ResponseFormatter::error(null, 'Data user gagal ditambahkan', 404);
    }

    public function updateUser(Request $request, $id)
    {
        $model = User::find($id);
        $model->update($request->all());
        if ($model)
            return ResponseFormatter::success($model, 'Data user berhasil diupdate');
        else
            return ResponseFormatter::error(null, 'Data user gagal diupdate', 404);
    }

    public function deleteUser($id)
    {
        $model = User::find($id);
        $model->delete();
        
        return ResponseFormatter::success(null, 'Data user berhasil diupdate');
        
    }

    //Data Buku Tamu 

    public function getBukuTamu()
    {
        $buku_tamus = BukuTamu::with('instansi','user:id,name')->get();
        if ($buku_tamus)
            return ResponseFormatter::success($buku_tamus, 'Data Buku Tamu berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data Buku Tamu tidak ada', 404);

        // return response()->json(['message'=>'Success', 'data'=> 'selpa']);
    }

    public function getBukuTamuById($id)
    {
        $buku_tamu = BukuTamu::with('instansi')->where('id', $id)->first();

        if ($buku_tamu)
            return ResponseFormatter::success($buku_tamu, 'Data buku_tamu berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data buku_tamu tidak ada', 404);
    }

    public function getBukuTamuUserById($idUser)
    {
        $getBukuTamuUser = BukuTamu::with([
            'user' => function ($query) use ($idUser) {
                $query->where('id', $idUser);
            }
        ])
            ->where('user_id', $idUser)
            ->get();

        if ($getBukuTamuUser)
            return ResponseFormatter::success($getBukuTamuUser, 'Data Type Element berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data Type Element tidak ada', 404);
    }

    public function storeBukuTamu(Request $request)
    {
        $attrs = $request->validate([
            'no_token' => 'required',
            'jumlah_tamu' => 'required',
            'nama_tamu' => 'required',
            'alamat' => 'required',
            'nama_instansi' => 'required',
            'tanggal_kunjungan' => 'required',
            'sunrise' => 'required',
            'tujuan_pegawai' => 'required',
            'tujuan_kunjungan' => 'required',
        ]);

        $buku_tamu = BukuTamu::create([
            'user_id' => auth()->user()->id,
            'no_token' => $attrs['no_token'],
            'jumlah_tamu' => $attrs['jumlah_tamu'],
            'nama_tamu' => $attrs['nama_tamu'],
            'alamat' => $attrs['alamat'],
            'nama_instansi' => $attrs['nama_instansi'],
            'tanggal_kunjungan' => $attrs['tanggal_kunjungan'],
            'sunrise' => $attrs['sunrise'],
            'instansi_id'=> $request['instansi_id'],
            'tujuan_pegawai' => $attrs['tujuan_pegawai'],
            'tujuan_kunjungan' => $attrs['tujuan_kunjungan'],
        ]);
        
        if ($buku_tamu)
            return ResponseFormatter::success($buku_tamu, 'Data buku_tamu berhasil ditambahkan');
        else
            return ResponseFormatter::error(null, 'Data buku_tamu gagal ditambahkan', 404);
    }

    public function updateBukuTamu(Request $request, $id)
    {
        $buku_tamu = BukuTamu::find($id);
        $buku_tamu->update($request->all());
        if ($buku_tamu)
            return ResponseFormatter::success($buku_tamu, 'Data buku_tamu berhasil diupdate');
        else
            return ResponseFormatter::error(null, 'Data buku_tamu gagal diupdate', 404);
    }

    public function deleteBukuTamu($id)
    {
        $buku_tamu = BukuTamu::find($id);
        $buku_tamu->delete();
        
        return ResponseFormatter::success(null, 'Data buku_tamu berhasil diupdate');
        
    }

    public function getInstansi()
    {
        $instansis = Instansi::all();
        if ($instansis)
            return ResponseFormatter::success($instansis, 'Data instansi berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data instansi tidak ada', 404);
    }

    

    public function getPegawai()
    {
        $pegawais = Pegawai::with('instansi')->get();
        if ($pegawais)
            return ResponseFormatter::success($pegawais, 'Data pegawai berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data pegawai tidak ada', 404);
    }
    public function getPegawaiInstansiById($idInstansi)
    {
        $getPegawaiInstansi = Pegawai::with([
            'instansi' => function ($query) use ($idInstansi) {
                $query->where('id', $idInstansi);
            }
        ])
            ->where('instansi_id', $idInstansi)
            ->get();

        if ($getPegawaiInstansi)
            return ResponseFormatter::success($getPegawaiInstansi, 'Data Type Element berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data Type Element tidak ada', 404);
    }
    

}
