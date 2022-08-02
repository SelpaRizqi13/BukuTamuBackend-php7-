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

    </style>
</head>

<body>

    <h1 style="text-align: center">Data Survei</h1>

    <table id="customers">
        <tr>
            <th style="text-align: center">No</th>
            <th>Nama</th>
            <th>Tanggal Kegiatan</th>
            <th>Deskripsi Kegiatan</th>
            
        </tr>
        @foreach ($surveis as $key => $value)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $value->nama_kegiatan }}</td>
                <td>{{ $value->tanggal_kegiatan }}</td>
                <td>{{ $value->deskripsi }}</td>
            </tr>
        @endforeach
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
