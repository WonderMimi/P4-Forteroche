<?php

namespace P4\src\manager;

use P4\config\Parameter;
use P4\src\model\Comment;

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
        $result = $this->createQuery($sql, [$postId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function addComment(Parameter $post, $postId)
    {
        $sql = 'INSERT INTO comments (author, comment, status, created_date, post_id) VALUES (?, ?, "autorisé" ,NOW(), ?)';
        $this->createQuery($sql, [$post->get('author'), $post->get('comment'), $postId]);
    }
}
