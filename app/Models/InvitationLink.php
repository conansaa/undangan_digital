<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InvitationLink extends Model
{
    use HasFactory;

    protected $fillable = ['figure_id', 'link', 'total_tagihan', 'status_pembayaran', 'tanggal_pembayaran', 'expired_at'];

    public function figure()
    {
        return $this->belongsTo(Figures::class);
    }

    // Cek apakah link masih aktif
    public function isActive()
    {
        return $this->payment_status === 'paid' && Carbon::now()->lt($this->expires_at);
    }
}
