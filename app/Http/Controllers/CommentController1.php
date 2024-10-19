<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Sheets;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan komentar ke database
        Comment::create($request->all());

        // Periksa apakah checkbox untuk mengirim ke Google Sheets dicentang
        if ($request->input('submit_to_google_sheets')) {
            $spreadsheetUrl = $this->sendToGoogleSheets($request->input('name'), $request->input('message'));
            return redirect()->route('comments.index')->with(['success' => 'Komentar berhasil ditambahkan!', 'spreadsheetUrl' => $spreadsheetUrl]);
        }

        return redirect()->route('comments.index')->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function index()
    {
        $comments = Comment::orderBy('name', 'asc')->get();  
        return view('comments.index', compact('comments'));
    }

    protected function sendToGoogleSheets($name, $message)
{
    // Tambahkan log untuk memeriksa apakah fungsi dipanggil
    Log::info('sendToGoogleSheets called with:', ['name' => $name, 'message' => $message]);

    // Inisialisasi Google Client
    $client = new Client();
    $client->setAuthConfig(storage_path('app/google/client_secret_554317454352-h19fgrhnrqppmmrmrvs123179k5pott9.apps.googleusercontent.com.json'));
    $client->addScope(Sheets::SPREADSHEETS);

    // Buat layanan Sheets
    $service = new Sheets($client);

    // Ganti dengan ID Spreadsheet yang sudah ada
    $spreadsheetId = 'your_spreadsheet_id'; // Ganti dengan ID spreadsheet Anda
    $range = 'Sheet1!A:B';

    // Data yang akan ditambahkan ke Google Sheets
    $values = [
        [$name, $message]
    ];

    $body = new \Google\Service\Sheets\ValueRange([
        'values' => $values
    ]);

    try {
        // Tambahkan data ke spreadsheet
        $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, [
            'valueInputOption' => 'RAW'
        ]);

        // Log jika data berhasil ditambahkan
        Log::info('Data sent to Google Sheets: ', (array) $result); // Cukup konversi objek menjadi array

        // Tampilkan URL Spreadsheet ke pengguna
        return 'https://docs.google.com/spreadsheets/d/' . $spreadsheetId . '/edit';
    } catch (\Exception $e) {
        // Log error jika terjadi masalah
        Log::error('Error creating or sending data to Google Sheets: ' . $e->getMessage());
        return null; // Kembalikan null jika ada error
    }
}


}
