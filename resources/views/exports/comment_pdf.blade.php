<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ucapan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #4F81BD; color: white; }
    </style>
</head>
<body>
    <h2>Daftar Ucapan</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Tamu</th>
                <th>Ucapan</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $comment)
                <tr>
                    <td>{{ $comment->rsvp->name }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
