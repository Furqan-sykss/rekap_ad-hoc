<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class AdminController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('/'); // Pastikan Anda memiliki view 'admin/index.blade.php'
    }
}