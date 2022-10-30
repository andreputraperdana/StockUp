<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $totalbaranghabis;
    public $totalbarangakankadaluarsa;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($TotalBarangHabis, $TotalBarangAkanKadaluarsa)
    {
        $this->totalbaranghabis = $TotalBarangHabis;
        $this->totalbarangakankadaluarsa = $TotalBarangAkanKadaluarsa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Total Barang Keselurahan StockUp')->view('notifemail');
    }
}
