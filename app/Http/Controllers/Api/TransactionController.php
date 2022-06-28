<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Repositories\UserRepository;
use App\Models\Repositories\UtilsRepository;
use App\Models\Repositories\TransactionRepository;

use App\Services\TransactionService;


class TransactionController extends Controller
{
    public function transaction(Request $request)
    {
        $transaction = (new TransactionService())->transaction($request);
        return $transaction;
    }


}