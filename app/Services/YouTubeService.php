<?php

namespace App\Services;

use Exception;
use Google\Client;
use Google\Service\YouTube;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class YouTubeService
{
    protected $youtube;

    public function __construct()
    {
        $client = new Client();
        $client->setDeveloperKey(env('YOUTUBE_API_KEY'));
        $this->youtube = new YouTube($client);
    }

    // Fetch videos by keyword
    public function getVideosByKeyword($keyword, $maxResults = 10)
    {
        $cacheKey = "youtube_videos_by_keyword_" . md5($keyword . $maxResults);
        return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($keyword, $maxResults) {
            try {
                $response = $this->youtube->search->listSearch('snippet', [
                    'q' => $keyword,
                    'maxResults' => $maxResults,
                    'type' => 'video',
                ]);
                return $response->getItems();
            } catch (Exception $e) {
                Log::error('Error fetching videos by keyword: ' . $e->getMessage());
                return [];
            }
        });
    }

    // Fetch videos by category
    public function getVideosByCategory($categoryId, $maxResults = 10)
    {
        $cacheKey = "youtube_videos_by_category_{$categoryId}_{$maxResults}";
        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($categoryId, $maxResults) {
            try {
                $response = $this->youtube->videos->listVideos('snippet', [
                    'chart' => 'mostPopular',
                    'videoCategoryId' => $categoryId,
                    'regionCode' => 'US',
                    'maxResults' => $maxResults,
                ]);
                return $response->getItems();
            } catch (Exception $e) {
                Log::error('Error fetching videos by category: ' . $e->getMessage());
                return [];
            }
        });
    }

    // Fetch all videos from a channel
    public function getAllVideos($channelId, $maxResults = 10)
    {
        $cacheKey = "youtube_all_videos_{$channelId}_{$maxResults}";
        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($channelId, $maxResults) {
            try {
                $response = $this->youtube->search->listSearch('snippet', [
                    'channelId' => $channelId,
                    'maxResults' => $maxResults,
                    'type' => 'video',
                    'order' => 'date',
                ]);
                return $response->getItems();
            } catch (Exception $e) {
                Log::error('Error fetching all videos: ' . $e->getMessage());
                return [];
            }
        });
    }

    // Fetch video details
    public function getVideoDetails($videoId)
    {
        $cacheKey = "youtube_video_details_{$videoId}";
        return Cache::remember($cacheKey, now()->addHours(1), function () use ($videoId) {
            try {
                $response = $this->youtube->videos->listVideos('snippet,contentDetails,statistics', [
                    'id' => $videoId,
                ]);
                return $response->getItems();
            } catch (Exception $e) {
                Log::error('Error fetching video details: ' . $e->getMessage());
                return null;
            }
        });
    }

    // Fetch playlists by channel
    public function getPlaylistsByChannel($channelId, $maxResults = 10)
    {
        $cacheKey = "youtube_playlists_by_channel_{$channelId}_{$maxResults}";
        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($channelId, $maxResults) {
            try {
                $response = $this->youtube->playlists->listPlaylists('snippet,contentDetails', [
                    'channelId' => $channelId,
                    'maxResults' => $maxResults,
                ]);
                return $response->getItems();
            } catch (Exception $e) {
                Log::error('Error fetching playlists by channel: ' . $e->getMessage());
                return [];
            }
        });
    }

    // Fetch videos by playlist
    public function getVideosByPlaylist($playlistId, $maxResults = 10)
    {
        $cacheKey = "youtube_videos_by_playlist_{$playlistId}_{$maxResults}";
        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($playlistId, $maxResults) {
            try {
                $response = $this->youtube->playlistItems->listPlaylistItems('snippet,contentDetails', [
                    'playlistId' => $playlistId,
                    'maxResults' => $maxResults,
                ]);
                return $response->getItems();
            } catch (Exception $e) {
                Log::error('Error fetching videos by playlist: ' . $e->getMessage());
                return [];
            }
        });
    }

    // Fetch trending videos
    public function getTrendingVideos($regionCode = 'US', $categoryId = null, $maxResults = 10)
    {
        $cacheKey = "youtube_trending_videos_{$regionCode}_{$categoryId}_{$maxResults}";
        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($regionCode, $categoryId, $maxResults) {
            try {
                $params = [
                    'chart' => 'mostPopular',
                    'regionCode' => $regionCode,
                    'maxResults' => $maxResults,
                ];

                if ($categoryId) {
                    $params['videoCategoryId'] = $categoryId;
                }

                $response = $this->youtube->videos->listVideos('snippet,contentDetails,statistics', $params);
                return $response->getItems();
            } catch (Exception $e) {
                Log::error('Error fetching trending videos: ' . $e->getMessage());
                return [];
            }
        });
    }

    // Fetch video comments
    public function getVideoComments($videoId, $maxComments = 50)
    {
        $cacheKey = "youtube_comments_{$videoId}_{$maxComments}";
        return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($videoId, $maxComments) {
            $comments = [];
            $pageToken = null;
            $totalFetched = 0;

            do {
                try {
                    $response = $this->youtube->commentThreads->listCommentThreads('snippet', [
                        'videoId' => $videoId,
                        'textFormat' => 'plainText',
                        'pageToken' => $pageToken,
                        'maxResults' => min(10, $maxComments - $totalFetched),
                    ]);



                    foreach ($response['items'] as $comment) {
                        $comments[] = [
                            'author' => $comment['snippet']['topLevelComment']['snippet']['authorDisplayName'] ?? 'Unknown',
                            'author_image' => $comment['snippet']['topLevelComment']['snippet']['authorProfileImageUrl'] ?? 'https://via.placeholder.com/255x145',
                            'author_url' => $comment['snippet']['topLevelComment']['snippet']['authorChannelUrl'] ?? '',
                            'message' => $comment['snippet']['topLevelComment']['snippet']['textDisplay'] ?? '',
                            'published_at' => $comment['snippet']['topLevelComment']['snippet']['publishedAt'] ?? null,
                            'likeCount' => $comment['snippet']['topLevelComment']['snippet']['likeCount'] ?? 0,
                            'isLiked' => $comment['snippet']['topLevelComment']['snippet']['viewerRating'] === 'like',
                            'isPinned' => $comment['snippet']['isPinned'],
                            'isReply' => false,
                            'replies' => [],
                            'replyCount' => $comment['snippet']['totalReplyCount'] ?? 0,
                            'videoId' => $videoId,
                            'commentId' => $comment['snippet']['topLevelComment']['id'] ?? '',
                            'data' => $comment,

                        ];
                    }

                    // dd($response);

                    $totalFetched += count($response['items']);
                    $pageToken = $response['nextPageToken'] ?? null;
                } catch (Exception $e) {
                    Log::error('Error fetching comments: ' . $e->getMessage());
                    break;
                }
            } while ($pageToken && $totalFetched < $maxComments);

            // dd($comments);

            return $comments;
        });
    }
}
