<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote; // Ensure you have a Vote model
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'driver_name' => 'required|string|max:255',
        ]);

        // Store the vote in the database
        try {
            DB::table('votes')->insert([
                'driver_name' => $request->driver_name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Vote submitted successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit vote. Please try again.',
            ], 500);
        }
    }
}
