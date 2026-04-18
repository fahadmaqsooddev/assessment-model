<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GreetingService;
class GreetingController extends Controller
{
    protected $greetingService;

        // Inject GreetingService via constructor
    public function __construct(GreetingService $greetingService)
    {
        $this->greetingService = $greetingService;
    }

    public function showGreeting()
    {
        $greeting = $this->greetingService->greet();
        return response()->json(['message' => $greeting]);
    }

}
