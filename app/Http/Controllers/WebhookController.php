<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $data = $request->all(); // Get all payload data from the webhook request
        // Process the data here (e.g., update order status)
        // print_rnpm run prod
        ($data);
    }
}
