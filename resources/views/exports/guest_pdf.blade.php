<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #4F81BD; color: white; }
    </style>
</head>
<body>
    <h2>Daftar Tamu</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Konfirmasi</th>
                <th>Jumlah Tamu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $rsvp)
                <tr>
                    <td>{{ $rsvp->name }}</td>
                    <td>{{ $rsvp->phone_number }}</td>
                    <td>{{ $rsvp->confirmation == 'Hadir' ? 'Hadir' : 'Tidak Hadir' }}</td>
                    <td>{{ $rsvp->total_guest }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
