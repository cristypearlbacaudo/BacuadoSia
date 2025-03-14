<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    //

    public function getBookingEasy() {
        $easy = DB::select('SELECT bk. *, u.name AS u_name, u.email AS u_email, r.room_num AS room_num, r.type AS room_type, r.room_desc AS room_desc, bk.start_date AS date_start, bk.end_date AS date_end,
        p.amount AS amount
        FROM bookings AS bk
        INNER JOIN users AS u ON bk.user_id = u.id
        INNER JOIN rooms AS r ON bk.room_id = r.id
        INNER JOIN payments AS p ON bk.id = p.booking_id');

        return response()->json(['success' => true, 'easy' => $easy, 200]);
    }

    public function getBookingModerate() {
        $moderate = DB::table('bookings as bk')
        ->select('bk.*', 'u.name AS u_name', 'u.email AS u_email', 'r.room_num AS room_num', 'r.type AS room_type', 'r.room_desc AS room_desc', 'bk.start_date AS date_start', 'bk.end_date AS date_end',
        'p.amount AS amount')
        ->join('users AS u', 'bk.user_id', '=', 'u.id')
        ->join('rooms AS r', 'bk.room_id', '=', 'r.id')
        ->join('payments AS p', 'bk.id', '=', 'p.booking_id')
        ->get();

        return response()->json(['success' => true,'moderate' => $moderate, 200]);
    }

    public function getBookingChallenging()
    {
        $challenging = Booking::with('user','room','payment')->get();

        return response()->json(['success' => true, 'challenging' => $challenging, 200]);
    }

    public function getBookingDifficult(){
        $difficult = Booking::with(['user' => function($q){
            $q->select('*');
        }])->with(['room' => function($q){
            $q->select('*');
        }])->with(['payment' => function($q){
            $q->select('*');
        }]) ->get();

        return response()->json(['success' => true, 'difficult' => $difficult, 200]);
    }
}
