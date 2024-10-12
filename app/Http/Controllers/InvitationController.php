<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function showInvitation()
    {
        // Ambil data alamat dari database
        $address = Address::first(); // Misalnya hanya ada satu alamat

        // Kirim data ke view
        return view('invitation', compact('address'));
    }
}
