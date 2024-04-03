<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Hiển thị trang hồ sơ cá nhân của người dùng.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Lấy thông tin của người dùng hiện tại đã đăng nhập
        $user = Auth::user();

        // Trả về view 'profile.index' và truyền biến $user vào view
        return view('profile.index', ['user' => $user]);
    }
}
