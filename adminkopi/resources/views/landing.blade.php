<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Tgl Lahir</th>
                <th>Tingkat</th>
                <th>Status</th>
            </tr>
            @foreach ($anggota as $a)
                <tr>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->no_hp }}</td>
                    <td>{{ $a->tgl_lahir }}</td>
                    <td style="text-align: center">{{ $a->tingkat->nama}}</td>
                    <td>{{ $a->status->nama }}</td>
                </tr>
            @endforeach
        </table>
</body>
</html>