<?php

namespace App\Http\Controllers;

use App\Services\YouTubeService;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class YouTubeController extends Controller
{
    protected $youtubeService;

    public function __construct(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function fetchVideos()
    {
        $videos = $this->youtubeService->getVideosByKeyword('Laravel tutorial');

        return view('youtube.index', compact('videos'));
    }

    public function fetchVideosByCategory($categoryId)
    {
        $videos = $this->youtubeService->getVideosByCategory($categoryId);

        return view('youtube.index', compact('videos'));
    }




    public function fetchAllVideos()
    {
        $page_title = "Youtube Videos";
        $response = $this->youtubeService->getAllVideos(env('YOUTUBE_CHANNEL_ID'));

        // Map and filter the response to extract required fields
        $youtube_videos = collect($response)->map(function ($item) {
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

        // Paginate the collection
        $perPage = 9; // Videos per page
        $page = request()->get('page', 1); // Current page
        $videos = new LengthAwarePaginator(
            $youtube_videos->forPage($page, $perPage), // Slice the collection for the current page
            $youtube_videos->count(), // Total number of videos
            $perPage, // Items per page
            $page, // Current page
            ['path' => request()->url()] // URL for pagination links
        );

        return view('main.youtube.index', compact('page_title', 'videos'));
    }






    public function viewVideoDetails($videoId)
    {
        $videoDetails = $this->youtubeService->getVideoDetails($videoId);
        return view('main.youtube.details', compact('videoDetails'));
    }

    public function fetchPlaylists()
    {
        $page_title = "Playlist";

        $response = $this->youtubeService->getPlaylistsByChannel(env('YOUTUBE_CHANNEL_ID'));
        // dd($response);
        $youtube_playlist = collect($response ?? [])->map(function ($item) {
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

        // Paginate the collection
        $perPage = 6; // Videos per page
        $page = request()->get('page', 1); // Current page
        $playlist = new LengthAwarePaginator(
            $youtube_playlist->forPage($page, $perPage), // Slice the collection for the current page
            $youtube_playlist->count(), // Total number of videos
            $perPage, // Items per page
            $page, // Current page
            ['path' => request()->url()] // URL for pagination links
        );

        // dd($playlist);
        return view('main.youtube.playlist', compact('playlist', 'page_title'));
    }

    public function viewPlaylistVideos($playlistId)
    {

        $page_title = "Playlist Videos";
        $response = $this->youtubeService->getVideosByPlaylist($playlistId);
        // dd($response);
        // Map and filter the response to extract required fields
        $youtube_videos = collect($response)->map(function ($item) {
            return [
                'id' => $item['contentDetails']['videoId'] ?? null,
                'title' => $item['snippet']['title'] ?? 'No Title',
                'description' => $item['snippet']['description'] ?? 'No Description',
                'thumbnail' => $item['snippet']['thumbnails']['high']['url'] ?? 'https://via.placeholder.com/255x145',
                'published_at' => $item['contentDetails']['videoPublishedAt'] ?? null,
            ];
        })->filter(function ($video) {
            return !is_null($video['id']);
        })->map(function ($video) {
            // Convert array to stdClass
            return json_decode(json_encode($video));
        });

        // Paginate the collection
        $perPage = 9; // Videos per page
        $page = request()->get('page', 1); // Current page
        $videos = new LengthAwarePaginator(
            $youtube_videos->forPage($page, $perPage), // Slice the collection for the current page
            $youtube_videos->count(), // Total number of videos
            $perPage, // Items per page
            $page, // Current page
            ['path' => request()->url()] // URL for pagination links
        );


        // dd($videos);
        return view('main.youtube.index', compact('videos', 'page_title'));
    }

    public function getTrendingVideos()
    {
        $page_title = "Trending Videos";

        $response = $this->youtubeService->getTrendingVideos();

        // Map and filter the response to extract required fields
        $youtube_videos = collect($response)->map(function ($item) {
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

        // Paginate the collection
        $perPage = 9; // Videos per page
        $page = request()->get('page', 1); // Current page
        $videos = new LengthAwarePaginator(
            $youtube_videos->forPage($page, $perPage), // Slice the collection for the current page
            $youtube_videos->count(), // Total number of videos
            $perPage, // Items per page
            $page, // Current page
            ['path' => request()->url()] // URL for pagination links
        );

        return view('main.youtube.index', compact('page_title', 'videos'));
    }


    public function showVideo($videoId)
    {
        $video = [];
        $relatedVideos = [];
        // Get the current video details from YouTube API
        $response = $this->youtubeService->getVideoDetails($videoId);

        if ($response && $response[0]) {

            // Get all videos in the channel's playlist (for related videos)
            $playlistResponse = $this->youtubeService->getAllVideos(env('YOUTUBE_CHANNEL_ID'));

            // Initialize comments as an empty array in case comments are disabled
            $comments = [];

            // Check if comments are enabled before attempting to fetch them
            $commentsEnabled = isset($response[0]['statistics']['commentCount']) && $response[0]['statistics']['commentCount'] > 0;

            if ($commentsEnabled) {
                // Try to get the comments for the current video
                try {
                    $commentsResponse = $this->youtubeService->getVideoComments($videoId);

                    // Process the comments if they exist
                    $comments = collect($commentsResponse ?? []);
                } catch (\Exception $e) {
                    // Handle any errors that occur while fetching comments
                    // You can log the error or handle it in another way
                    Log::error("Error fetching comments for video {$videoId}: " . $e->getMessage());
                }
            }

            // Get video tags from the API response (if they exist)
            $tags = $response[0]['snippet']['tags'] ?? [];
            // Current video details from the response
            $video = [
                'id' => $response[0]['id'] ?? null,
                'video_id' => $response[0]['id'] ?? null,
                'title' => $response[0]['snippet']['title'] ?? 'No Title',
                'description' => $response[0]['snippet']['description'] ?? 'No Description',
                'thumbnail' => $response[0]['snippet']['thumbnails']['high']['url'] ?? 'https://via.placeholder.com/255x145',
                'channel' => $response[0]['snippet']['channelTitle'] ?? 'Unknown Channel',
                'published_at' => $response[0]['snippet']['publishedAt'] ?? null,
                'channel_url' => 'https://www.youtube.com/channel/' . $response[0]['snippet']['channelId'],
                'views' => $response[0]['statistics']['viewCount'] ?? 0,
                'comments_enabled' => $commentsEnabled,
                'comments' => $comments,
                'tags' => $tags,

            ];
            $video = json_decode(json_encode($video));
            // dd($video);

            // Get related videos by filtering out the current video from the playlist
            $relatedVideos = collect($playlistResponse)->map(function ($item) {
                return [
                    'id' => $item['id']['videoId'] ?? null,
                    'title' => $item['snippet']['title'] ?? 'No Title',
                    'thumbnail' => $item['snippet']['thumbnails']['high']['url'] ?? 'https://via.placeholder.com/255x145',
                    'channel' => $item['snippet']['channelTitle'] ?? 'Unknown Channel',
                    'published_at' => $item['snippet']['publishedAt'] ?? null,
                    'channel_url' => 'https://www.youtube.com/channel/' . $item['snippet']['channelId'],
                ];
            })->filter(function ($video) use ($videoId) {
                return $video['id'] && $video['id'] !== $videoId;
            })->take(3);
            $relatedVideos = json_decode(json_encode($relatedVideos));
        }
        // dd($relatedVideos);



        // Return the view with the current video, related videos, and comments
        return view('main.youtube.show', compact('video', 'relatedVideos'));
    }
}
