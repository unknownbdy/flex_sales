<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactUsTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(ContactUsTable $dataTable)
    {
        return $dataTable->render('ContactUs.index');
    }
}
