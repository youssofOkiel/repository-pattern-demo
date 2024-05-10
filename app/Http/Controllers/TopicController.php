<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\{TopicRepository, UserRepository};
use App\Repositories\Eloquent\Criteria\{ByUser, EagerLoading, IsLive, LatestFirst};

class TopicController extends Controller
{
    public function __construct(
        protected TopicRepository $topicRepository,
        protected UserRepository $userRepository
    ) {
    }

    public function index()
    {
        $topics = $this->topicRepository->withCriteria(
            new LatestFirst(),
            //            new IsLive(),
            //            new ByUser(3)
            new EagerLoading(['posts.user'])
        )->all();

        return view('topics.index', [
            'topics' => $topics,
        ]);
    }

    public function show(string $slug)
    {
        $topic = $this->topicRepository->withCriteria([
            new EagerLoading(['posts.user']),
        ])
            ->findBySlug($slug);

        return view('topics.show', [
            'topic' => $topic,
        ]);

    }
}
