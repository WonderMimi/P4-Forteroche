<?php

namespace P4\src\manager;

class CommentManager extends DatabaseManager
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setAuthor($row['author']);
        $comment->setComment($row['comment']);
        $comment->setCreated_date($row['created_date']);
        return $comment;
    }

    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT id, author, comment, created_date FROM comments WHERE post_id = ? ORDER BY created_date DESC';
        return $this->createQuery($sql, [$postId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
}
