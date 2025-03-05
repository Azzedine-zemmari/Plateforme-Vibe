<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Pest\Plugins\Parallel\Support\CompactPrinter;

class QrCodeController extends Controller
{
   public function generate($userId){

        $profileUser = User::findOrFail($userId);

        $token = Str::random(32);
        DB::table('qr_code_tokens')->insert([
            'user_id' => $profileUser->id,
            'token' => $token,
            'expires_at' => Carbon::now()->addHour(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $invitationLink = route('invite', ['token' => $token]);

        $qrCode = QrCode::size(200)->generate($invitationLink);

        return view('qr-code', compact('qrCode', 'invitationLink', 'profileUser'));

   }

   public function handleInvitation(Request $request){

        $token = $request->query('token');
        $scanner = auth()->user();

        if (!$scanner) {
            return redirect()->route('login')->with('error', 'You have to login firts');
        }

        $qrToken = DB::table('qr_code_tokens')->where('token', $token)
        ->where('expires_at', '>', Carbon::now())
        ->first();

        if (!$qrToken) {
            return redirect()->route('dashboard')->with('error', 'Invalid or expired invitation link.');
        }

        if ($scanner->id == $qrToken->user_id) {
            return redirect()->route('USERPROFILE')->with('error', "You can't send request to you yourself");
        }

        DB::table('freinds')->insert([
            'user_id'=>$scanner->id,
            'friend_id'=>$qrToken->user_id,
            'status' => 'done',
            'created_at' => now(),
            'updated_at' => now(),  
        ]);

        echo('good');
   }
}
