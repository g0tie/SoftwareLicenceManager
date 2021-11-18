<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LicenseKey;

class LicenseKeyController extends Controller
{
    public function generateKey()
    {
        $user = auth()->user();
        $licenseKey = $user->licenseKey()->create([
            'code' => generateLicenseKey(),
        ]);

        return response()->json([
            'code' => $licenseKey->code,
        ]);
    } 

    public function activateKey()
    {
        $user = auth()->user();
        $user->licenseKey()->update([
            'activated' => true
        ]);

        return response(200)->json([
            'status' => 200,
            'msg' => 'success'
        ]);
    }

    public function verifyKey(Request $request)
    {
        $user = User::where('email', $request->email);
        $userKey = $user->licenseKey()->code;
        $key = $request->key;

        if ($key !== $userKey) {
            return response(401)->json([
                'status' => 401,
                'msg' => "wrong key"
            ]);
        }

        return response(200)->json([
            'status' => 200,
            'msg' => 'success'
        ]);

    }

    private static function generateLicenseKey()
    {
        $charNbBySegment = 5;
        $segments = 4;
        $key = "";
        $tokens = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";

        for ($i = 0; $i < $segments; $i++) {
            $segment = "";

            for ($j = 0; $j < $charNbBySegment; $j++) {
               $segment .= $tokens[ rand( 0, strlen($tokens) - 1 ) ];
            }
            
            if ($i < $segment) {
                $key .= $segment . "-";
            } else {
                $key .= $segment;
            }
        }

        return $key;
    }
}
