<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\YouTubeService;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    protected $youtubeService;

    public function __construct(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function index()
    {
        $response = $this->youtubeService->getAllVideos(env('YOUTUBE_CHANNEL_ID'));
        // Map and filter the response to extract required fields
        $videos = collect($response)->map(function ($item) {
            return [
                'id' => $item['id']['videoId'] ?? null,
                'title' => $item['snippet']['title'] ?? 'No Title',
                'description' => $item['snippet']['description'] ?? 'No Description',
                'thumbnail' => $item['snippet']['thumbnails']['high']['url'] ?? 'https://via.placeholder.com/255x145',
                'published_at' => $item['snippet']['publishedAt'] ?? null,
            ];
        })->filter(function ($video) {
            return !is_null($video['id']);
        })->map(function ($video) {
            // Convert array to stdClass
            return json_decode(json_encode($video));
        });
        // $videos = $youtube_videos;

        return view('admin.videos.index', compact('videos'));
    }
    public function playlists()
    {
        $response = $this->youtubeService->getPlaylistsByChannel(env('YOUTUBE_CHANNEL_ID'));
        // dd($response);
        $playlist = collect($response ?? [])->map(function ($item) {
            return [
                'id' => $item['id'] ?? null,
                'title' => $item['snippet']['title'] ?? 'No Title',
                'description' => $item['snippet']['description'] ?? 'No Description',
                'thumbnail' => $item['snippet']['thumbnails']['high']['url'] ?? 'https://via.placeholder.com/255x145',
                'published_at' => $item['snippet']['publishedAt'] ?? null,
                'tags' => $item['snippet']['tags'] ?? [],
                'channelTitle' => $item['snippet']['channelTitle'] ?? 'No Channel Title',
                'channelId' => $item['snippet']['channelId'] ?? 'No Channel Id',
                'channelThumbnail' => $item['snippet']['channelThumbnail'] ?? 'https://via.placeholder.com/255x145',
                'itemCount' => $item['contentDetails']['itemCount'] ?? 0
            ];
        })->filter(function ($video) {
            return !is_null($video['id']);
        })->map(function ($video) {
            // Convert array to stdClass
            return json_decode(json_encode($video));
        });


        // $playlist = $youtube_playlist;

        // dd($playlist);
        return view('admin.videos.playlist', compact('playlist'));
    }

    public function trending()
    {


        $response = $this->youtubeService->getTrendingVideos();

        // Map and filter the response to extract required fields
        $videos = collect($response)->map(function ($item) {
            return [
                'id' => $item['id']['videoId'] ?? null,
                'title' => $item['snippet']['title'] ?? 'No Title',
                'description' => $item['snippet']['description'] ?? 'No Description',
                'thumbnail' => $item['snippet']['thumbnails']['high']['url'] ?? 'https://via.placeholder.com/255x145',
                'published_at' => $item['snippet']['publishedAt'] ?? null,
            ];
        })->filter(function ($video) {
            return !is_null($video['id']);
        })->map(function ($video) {
            // Convert array to stdClass
            return json_decode(json_encode($video));
        });

        // $videos = $youtube_videos;

        return view('admin.videos.trending', compact('videos'));
    }
}
