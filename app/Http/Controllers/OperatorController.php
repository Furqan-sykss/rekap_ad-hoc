<?php

namespace App\Http\Controllers;

use Illuminate\View\View;


use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Menampilkan halaman dashboard operator.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('/'); // Menggunakan view 'index.blade.php'
    }
}