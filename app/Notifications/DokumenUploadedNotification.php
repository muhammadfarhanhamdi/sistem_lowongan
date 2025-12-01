<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class DokumenUploadedNotification extends Notification
{
    use Queueable;

    protected $dokumen;

    public function __construct($dokumen)
    {
        $this->dokumen = $dokumen;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'dokumen_id' => $this->dokumen->id,
            'peserta_id' => $this->dokumen->id_peserta,
            'jenis' => $this->dokumen->jenis_dokumen,
            'file_path' => $this->dokumen->file_path,
            'message' => 'Peserta mengunggah dokumen: ' . $this->dokumen->jenis_dokumen,
        ];
    }
}
