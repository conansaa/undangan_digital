<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ucapan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .brand-title { color: maroon; font-weight: bold; font-size: 24px; }
        .document-title { font-weight: bold; font-size: 20px; }
        .section-title { font-weight: bold; font-size: 16px; }
        body {
            font-family: Arial, sans-serif;
            color: #000;
            font-size: 12px;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .content {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
        }
        .text-maroon {
            color: #7d5357; /* Merah maroon */
            font-weight: bold;
        }
        /* .table-bordered th, .table-bordered td {
            border: none;
        }
        .table-header {
            width: 100%;
            margin-bottom: 20px;
        } */
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table td, .table th {
            border: none;
            padding: 5px;
            text-align: left;
        }
        .m1 {
            margin-left: 100px;
        }
        .acara {
            margin-top: 20px;
        }
        .tamu {
            margin-top: 50px;
        }
        .footer {
            margin-top: 25px;
        }
        .thick {
            border-color: black;
            border-top-style: solid;
            border-top-width: thick;
        }
        .medium {
            border-color: black;
            border-bottom-style: solid;
            border-bottom-width: medium;
        }
    </style>
</head>
<body class="container-fluid mt-4">
    <div class="content">
        <table class="table w-150">
            <tr>
                <td style="width: 50%"><span class="text-maroon fw-bold fs-4">DiikatJanji</span></td>
                <td style="width: 20%"></td>
                <td style="width: 15%"></td>
                <th class="fs-4" style="width: 15%">Data Ucapan</th>
            </tr>
        </table>
        <hr>

        <!-- Informasi Acara -->
        <table class="table w-100 acara">
            <tr>
                <th style="width: 55%;">Diterbitkan oleh DiikatJanji</th>
                <th style="width: 15%;">Untuk</th>
                <td style="width: 5%;"></td>
                <td style="width: 25%;"></td>
            </tr>
            <tr>
                <td style="width: 55%;"></td>
                <td style="width: 15%;">Pemilik Acara</td>
                <td style="width: 5%;">:</td>
                <th style="width: 25%;">{{ $eventDetails->eventOwner->user->name }}</th>
            </tr>
            <tr>
                <td style="width: 55%;"></td>
                <td style="width: 15%;">Nama Acara</td>
                <td style="width: 5%;">:</td>
                <th style="width: 25%;">{{ $eventDetails->event_name }}</th>
            </tr>
            <tr>
                <td style="width: 55%;"></td>
                <td style="width: 15%;">Tanggal</td>
                <td style="width: 5%;">:</td>
                <th style="width: 25%;">{{ \Carbon\Carbon::parse($eventDetails->event_date)->locale('id')->translatedFormat('d F Y') }}</th>
            </tr>
            <tr>
                <td style="width: 55%;"></td>
                <td style="width: 15%;">Waktu</td>
                <td style="width: 5%;">:</td>
                <th style="width: 25%;">{{ \Carbon\Carbon::parse($eventDetails->event_time)->format('H:i') }}</th>
            </tr>
        </table>
    </div>

    <table class="table table-bordered tamu">
        <thead class="thick medium">
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
                    <td>{{ $comment->created_at->format('d M Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table w-100 footer">
        <tr>
            <td><small>Data ini sah dan diproses oleh komputer.</small></td>
            <td><small>Terakhir diupdate: {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y H:i') }}</small></td>
        </tr>
        <tr>
            <td><small>Silakan hubungi <span class="text-maroon fw-bold">customer service DiikatJanji</span> apabila kamu membutuhkan bantuan.</small></td>
            <td></td>
        </tr>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
