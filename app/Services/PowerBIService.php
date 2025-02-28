<?php
// app/Services/PowerBIService.php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class PowerBIService
{
    private $tenantId;
    private $clientId;
    private $clientSecret;
    private $workspaceId;
    private $reportId;

    public function __construct()
    {
        $this->tenantId = env('POWERBI_TENANT_ID');
        $this->clientId = env('POWERBI_CLIENT_ID');
        $this->clientSecret = env('POWERBI_CLIENT_SECRET');
        $this->workspaceId = env('POWERBI_WORKSPACE_ID');
        $this->reportId = env('POWERBI_REPORT_ID');
    }

    // Step 1: Get Access Token from Azure AD
    public function getAccessToken()
    {
        $response = Http::asForm()->post("https://login.microsoftonline.com/{$this->tenantId}/oauth2/v2.0/token", [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'scope' => 'https://graph.microsoft.com/.default',
        ]);

        return $response->json()['access_token'] ?? null;
    }

    // Step 2: Generate Embed Token
    public function getEmbedToken()
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return null;
        }

        $response = Http::withToken($accessToken)->post("https://api.powerbi.com/v1.0/myorg/groups/{$this->workspaceId}/reports/{$this->reportId}/GenerateToken", [
            'accessLevel' => 'View',
        ]);

        return $response->json()['token'] ?? null;
    }
}
