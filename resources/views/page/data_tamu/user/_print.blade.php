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

    <h1 style="text-align: center">Data Pengguna Aplikasi</h1>

    <table id="customers">
        <tr>
            <th style="text-align: center">No</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
        @foreach ($datas as $key => $value)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
            </tr>
        @endforeach
    </table>

    <script type="text/javascript">
        windows.print();
    </script>
</body>

</html>
