<?php

namespace App\Http\Controllers;

use App\Models\Article;

use App\Models\Comment;
use Inertia\Inertia;

class SiteController extends Controller
{
    public function home()
    {

    }

    public function articles()
    {

        return Inertia::render('Site/Articles', [

            'filters' => request()->only(['search']),
            'articles' => Article::with('user')->filter(request(['search']))
                ->paginate(10)
                ->withQueryString()
                ->through(fn($article) => [
                'id' => $article->id,
                'title' => $article->title,
                'slug' => $article->slug,
                'created_at' => date_format($article->created_at, 'd/m/Y H:i'),
                'user' => $article['user']['username'],
                'user_id' => $article->user_id
            ]),
        ]);
    }

    public function article(Article $article)
    {
        $comments = Comment::with('user')->where('article_id', $article->id)->paginate()->through(fn($comment) => [
            'id' => $comment->id,
            'title' => $comment->title,
            'body' => $comment->body,
            'created_at' => $comment->created_at,
            'user' => [
                'username' => $comment['user']['username'],
                'id'        => $comment['user']['id']
            ]
        ]);

        return Inertia::render('Site/Article', [
           'article'    => $article,
            'user'      => $article->user,
            'comments'  => $comments,
        ]);
    }
}
