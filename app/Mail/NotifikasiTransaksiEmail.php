<?php

namespace App\Mail;

use App\Models\Transaksi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiTransaksiEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $transaksi = Transaksi::find($this->id);
        if($transaksi->status_transaksi == 'DIPROSES') {
            $subject = 'Barang Sedang Diproses untuk untuk pengiriman ' . $transaksi->uuid;
        } elseif($transaksi->status_transaksi == 'DIKIRIM') {
            $subject = 'Barang Sedang dikirim ' . $transaksi->uuid;
        } elseif($transaksi->status_transaksi == 'BERHASIL') {
            $subject = 'Barang telah diterima ' . $transaksi->uuid;
        } elseif($transaksi->status_transaksi == 'GAGAL') {
            $subject = 'Transaksi GAGAL ' . $transaksi->uuid;
        }

        return $this->view('pages.backend.transaksi.email')
                    ->subject($subject)
                    ->with([
                        'transaksi' => $transaksi
                    ]);
    }
}
