<?php

namespace App\Http\Controllers;

use App\Services\PowerBIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StockController extends Controller
{
    public function refreshPowerBIDataset()
    {
        $accessToken = app(PowerBIService::class)->getAccessToken();

        if (!$accessToken) {
            return response()->json(['error' => 'Power BI authentication failed'], 401);
        }

        $workspaceId = env('POWERBI_WORKSPACE_ID');
        $datasetId = env('POWERBI_DATASET_ID');

        Http::withToken($accessToken)->post("https://api.powerbi.com/v1.0/myorg/groups/{$workspaceId}/datasets/{$datasetId}/refreshes");

        return response()->json(['success' => 'Power BI dataset refresh started']);
    }
}
