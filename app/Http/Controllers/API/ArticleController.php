<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        try {
            $articles = Article::all();

            return response()->json(
                [
                    'status' => true,
                    'message'=> 'All records fetched.',
                    'message_arabic' => 'تم جلب كافة السجلات.',
                    'data'   => $articles
                ],
                200
            );
        } catch (\throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Method articlesWithPagination This function is to retrieve
     * records by pagination
     *
     * @return void
     */
    public function articlesWithPagination()
    {
        try {
            $articles = Article::paginate(2);

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Records fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'   => $articles
                ],
                200
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }

    /**
     * Method articleById
     *
     * @param $id $id
     *
     * @return void
     */
    public function articleById($id)
    {
        try {
            $article = Article::where('id', $id)->first();

            return response()->json(
                [
                    'status'   => true,
                    'message'  => 'Record fetched.',
                    'message_arabic' => 'تم جلب السجل.',
                    'data'     => $article
                ],
                200
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $e->getMessage()
                ],
                500
            );
        }
    }
}
