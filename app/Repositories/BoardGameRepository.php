<?php

namespace App\Repositories;

use PDO;
use PDOException;
use App\Models\BoardGame;

class BoardGameRepository extends Repository
{
    /**
     * Fetches all board games with optional pagination.
     *
     * @param int|null $offset The offset from which to start listing the items.
     * @param int|null $limit The number of items to list.
     * @return array The list of board games.
     */
    function getAllBoardGames($offset = NULL, $limit = NULL)
    {
        try {
            // Build the query dynamically
            $query = "SELECT * FROM board_games_group.board_games";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset";
            }

            $stmt = $this->connection->prepare($query);

            // Bind the parameters if they are set
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }

            $stmt->execute();

            $boardGames = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $boardGames[] = $row; // Collecting each board game record into an array
            }

            return $boardGames;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return []; // Return an empty array on failure to maintain consistency
        }
    }


    function insertBoardGame($boardGame)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO board_games_group.board_games (name, min_players, max_players, complexity) VALUES (:name, :min_players, :max_players, :complexity)");


            $stmt->execute([$boardGame->name, $boardGame->min_players, $boardGame->max_players, $boardGame->complexity]);

            return $this->getBoardGameById($this->connection->lastInsertId());
        } catch (PDOException $e) {
            echo "Insert Error: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Retrieves a board game by its ID.
     * 
     * @param int $id The ID of the board game.
     * @return mixed The board game or null if not found.
     */
    function getBoardGameById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM board_games_group.board_games WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Fetch Error: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Updates an existing board game.
     * 
     * @param int $id The ID of the board game to update.
     * @param array $data The updated data for the board game.
     * @return bool True on success or false on failure.
     */
    function updateBoardGame($id, $data)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE board_games_group.board_games SET name = :name, min_players = :min_players, max_players = :max_players WHERE id = :id");
            $stmt->execute([
                ':id' => $id,
                ':name' => $data['name'],
                ':min_players' => $data['min_players'],
                ':max_players' => $data['max_players'],
            ]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Update Error: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Deletes a board game by its ID.
     * 
     * @param int $id The ID of the board game to delete.
     * @return bool True on success or false on failure.
     */
    function deleteBoardGame($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM board_games_group.board_games WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Delete Error: " . $e->getMessage();
            return false;
        }
    }
}
