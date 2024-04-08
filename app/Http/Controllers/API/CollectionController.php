<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Collection\Collection;
use Illuminate\Http\Request;
use Throwable;

class CollectionController extends Controller
{
    protected $currentUser;
    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentUser = auth('api')->user();
    }
    
    /**
     * Method index
     *
     * @return void
     */
    // public function index()
    // {
    //     try {

    //         $collections = Collection::all();

    //         return response()->json(
    //             [
    //                 'status' => true,
    //                 'message'=> 'Record fetched.',
    //                 'data'   => $collections
    //             ],
    //             200
    //         );

    //     } catch (Throwable $e)
    //     {
    //         return response()->json(
    //             [
    //                 'status' => false,
    //                 'message'=> $e->getMessage()
    //             ],
    //             500
    //         );
    //     }
    // }
    
    /**
     * Method collectionsByLimit
     *
     * @return void
     */
    // public function collectionsByLimit()
    // {
    //     try {

    //         $collections = Collection::take(5)->get();

    //         return response()->json(
    //             [
    //                 'status' => true,
    //                 'message'=> 'Record fetched.',
    //                 'data'   => $collections
    //             ],
    //             200
    //         );

    //     } catch (Throwable $e)
    //     {
    //         return response()->json(
    //             [
    //                 'status' => false,
    //                 'message'=> $e->getMessage()
    //             ],
    //             500
    //         );
    //     }
    // }
}
