<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BoardGame;
use App\Repositories\BoardGameRepository;
use Illuminate\Http\Response;

class BoardGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Initialize your repository
        $boardGameRepository = new BoardGameRepository();

        // Use the custom getAll function
        $boardGames = $boardGameRepository->getAllBoardGames();

        // Return the board games as a JSON response
        return response()->json($boardGames);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $boardGameRepository = new BoardGameRepository();
        // Create a new BoardGame instance
        $boardGame = new BoardGame();

        // Set the properties
        $boardGame->name = "Test"; // Assuming you have a 'name' column in your board games table
        $boardGame->min_players = 1; // Assuming you have a 'min_players' column
        $boardGame->max_players = 2; // Assuming you have a 'max_players' column
        $boardGame->complexity = 4; // Assuming you have a 'complexity' column

        // Save the new BoardGame to the database
        $boardGameRepository->insertBoardGame($boardGame);

        // Return a JSON response with the created board game and a 201 status code

    }

    public function store2(Request $request)
    {
        $boardGameRepository = new BoardGameRepository();

        // Create a new BoardGame instance
        $boardGame = new BoardGame();

        // Set the properties
        $boardGame->name = $request->name;
        $boardGame->min_players = $request->min_players;
        $boardGame->max_players = $request->max_players;
        $boardGame->complexity = $request->complexity;
        // Set other properties as needed

        // Save the new BoardGame to the database
        $boardGameRepository->insertBoardGame($boardGame);

        // Return a JSON response with the created board game and a 201 status code
        return response()->json($boardGame, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
