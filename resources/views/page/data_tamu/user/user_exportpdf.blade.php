<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #customer {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            
        }
        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customer td,
        #customer th {
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

        #customer th {
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
    <h1 class="tengah">Laporan Data Pengguna Aplikasi</h1>
    <p style="text-align: center">Periode Tanggal {{ date('d F Y', strtotime($awal)) }} s/d {{ date('d F Y', strtotime($akhir)) }}</p>

    <table id="customers" >
        
        <thead>
            <th style="text-align: center" width="10px">No</th>
            <th>Username</th>
            <th>Email</th>
        </thead>
        @foreach ($users as $key => $value)
            <tbody>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
            </tbody>
        @endforeach

    </table>
    <p>Rekap Jumlah Data Pengguna yang Daftar Aplikasi pertanggal</p>
    <table id="customer">
        <thead>
            <th width="100px">Tanggal</th>
            <th width="200px">Jumlah yang daftar</th>
        </thead>
        @foreach ($datas as $key => $value)
            <tbody>
                <td>{{ $value->tanggal }}</td>
                <td>{{ $value->jumlah }}</td>
            </tbody>
        @endforeach
    </table>    

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
