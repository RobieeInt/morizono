<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ExportContactsController extends Controller
{
    public function __invoke()
    {
        $filename = 'contacts_'.now()->format('Ymd_His').'.csv';
        $headers = ['Content-Type' => 'text/csv'];

        return response()->streamDownload(function() {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID','Name','Email','Phone','Source','Message','KPR Bank','KPR Cicilan Fixed','Created At','Read At']);
            Contact::orderBy('id')->chunk(500, function($rows) use ($handle){
                foreach ($rows as $c) {
                    fputcsv($handle, [
                        $c->id, $c->name, $c->email, $c->phone, $c->source,
                        preg_replace("/\r\n|\n|\r/", ' ', $c->message),
                        $c->kpr_meta['bank_name'] ?? '',
                        $c->kpr_meta['result']['installment_fixed'] ?? '',
                        $c->created_at, $c->read_at
                    ]);
                }
            });
            fclose($handle);
        }, $filename, $headers);
    }
}
