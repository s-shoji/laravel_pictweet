<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $sum = $this->sumUser();

        return view('users/index', [
            
            'sumu' => $sum,
        ]);
    }
    private function sumUser()
    {
       $sumUsers = User::all()->where('created_at', '>=',  date_format(now(),'%Y-%m-01'))->count();
       return $sumUsers;
    }
}
