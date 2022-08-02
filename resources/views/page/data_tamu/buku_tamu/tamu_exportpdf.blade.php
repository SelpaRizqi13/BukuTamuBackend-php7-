<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .rangkasurat {
            width: 800px;
            margin: 0 auto;
            background-color: #ddd;
            height: 500px;
            padding: 20px;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }

        #kopsurat{
            border-bottom: 5px solid #000;
            padding: 2px;
        }
    </style>
</head>

<body>
        <table id="kopsurat" width="100%">
            <tr>
                <td><img src="<?php echo $pic ?>" width="100px"></td>
                <td class="tengah">
                    <h2>PEMERINTAH KOTA BANDUNG</h2>
                    <h2>DINAS KOMUNIKASI DAN INFORMATIKA</h2>
                    <p>Jalan Wastukencana No. 02 Bandung Telepon 4234892, Faximile 42348922</p>
                    <p>e-mail : diskominfo@bandung.go.id</p>
                </td>
            </tr>
        </table>
    
    <h1 style="text-align: center">Laporan Data Tamu</h1>

    <table id="customers">
        <thead>
            <th style="text-align: center">No</th>
            <th>No Token</th>
            <th>Jumlah Tamu</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Instansi</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Tujuan Instansi</th>
            <th>Tujuan Pegawai</th>
            <th>Tujuan Kunjungan</th>
        </thead>
        @foreach ($buku_tamus as $key => $value)
            <tbody>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $value->no_token }}</td>
                <td>{{ $value->jumlah_tamu }}</td>
                <td>{{ $value->nama_tamu }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->nama_instansi }}</td>
                <td>{{ $value->tanggal_kunjungan }}</td>
                <td>{{ $value->sunrise }}</td>
                <td>{{ $value->instansi->nama_instansi }}</td>
                <td>{{ $value->tujuan_pegawai }}</td>
                <td>{{ $value->tujuan_kunjungan }}</td>
            </tbody>
        @endforeach
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
