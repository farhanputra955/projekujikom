<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    return $this->from('pengirim@gmail.com')
                   ->view('kontak')
                   ->with(
                    [
                        'nama' => 'Farhan Putra',
                        'website' => 'www.malasngoding.com',
                        'pesan' => '{{$kontak->konten}}',
                    ]);
    }
}
