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
        $comment->setFlag($row['flag']);
        return $comment;
    }

    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT id, author, comment, created_date, flag FROM comments WHERE post_id = ? ORDER BY created_date DESC';
        $result = $this->createQuery($sql, [$postId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function addComment(Parameter $form_post, $postId)
    {
        $sql = 'INSERT INTO comments(author, comment, created_date, flag, post_id, status) VALUES (?, ?,NOW(), ?, ?, "autorisé")';
        $this->createQuery($sql, [$form_post->get('author'), $form_post->get('comment'), 1, $postId]);
    }

    public function flagComment($commentId)
    {
        $sql = 'UPDATE comments SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }

    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }
}
