<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LicenseKey;
use App\Models\User;

class LicenseKeyController extends Controller
{

    public function dashboard()
    {
        $licenseKey = auth()->user()->licenseKey;
        $activated = $licenseKey->activated; 
        $licenseKey = $licenseKey->code; 

        return view( 'dashboard', compact('licenseKey', 'activated') );
    }

    public function generateKey()
    {
        $user = auth()->user();
        $generatedKey = self::generateLicenseKey();
        $isKeyAlreadyExists = LicenseKey::firstWhere('code', $generatedKey);

        if ($isKeyAlreadyExists) {
            $generatedKey = self::generateLicenseKey();
        }

        $licenseKey = $user->licenseKey()->create([
            'code' => $generatedKey,
        ]);

        return redirect('dashboard');
    } 

    public function activateKey()
    {
        $user = auth()->user();
        $user->licenseKey()->update([
            'activated' => true
        ]);

        return redirect()->back();
    }

    public function verifyKey(Request $request)
    {
        $key = LicenseKey::firstWhere('code', $request->key);

        if (!key) return response(401)->json([
            'status' => 401,
            'msg' => 'key not found'
        ]);
        
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
            
            if ($i < ($segments - 1)) {
                $key .= $segment . "-";
            } else {
                $key .= $segment;
            }
        }

        return $key;
    }
}
