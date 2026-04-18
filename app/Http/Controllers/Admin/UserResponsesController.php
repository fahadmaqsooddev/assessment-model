<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Response;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class UserResponsesController extends Controller
{
     public function index() {
        // Retrieve distinct records based on 'unique_token' and paginate
        $responses = Response::select('unique_token', 'user_id', DB::raw('MIN(id) as id')) // Use MIN or MAX for id to satisfy MySQL's strict mode
            ->with(['user' => function($query) {
                $query->select('id', 'name', 'email'); // Select specific columns from the user table
            }])
            ->groupBy('unique_token', 'user_id') // Group by unique_token and user_id to get distinct tokens
            ->paginate(10); // Paginate the result

        return view('admin.dashboard.responses.index', compact('responses'));
    }
     public function responsedetail($token) {
        // Retrieve responses where 'unique_token' matches the given token, including related questions and choices
        $responses = Response::where('unique_token', $token)
            ->with('question', 'choice')
            ->get();

        // Check if any responses were found
        if ($responses->isNotEmpty()) {
            return view('admin.dashboard.responses.view', compact('responses','token')); // Return the view with responses
        } else {
            return redirect('/responses')->with('error', 'No responses found for this token'); // Redirect with an error message
        }
    }
    public function downloadpdf($token){
        $responses = Response::where('unique_token', $token)
            ->with('question', 'choice')
            ->get();
        $data=[
            'title'=>'PDF of Responses',
            'date'=>date('m/d/Y'),
            'responses'=>$responses
        ];
        $pdf = Pdf::loadView('admin.dashboard.pdf.responses', $data);
        return $pdf->download('invoice.pdf');
    }



}
