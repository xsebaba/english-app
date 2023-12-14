<?php

namespace App\Http\Controllers;

use App\Mail\AttachmentMail;
use App\Mail\PurchaseMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function email()
    {

        Mail::to('info@englishclinic.com')->send(new PurchaseMail());
        return new PurchaseMail();
    }
}
