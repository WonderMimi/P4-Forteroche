<?php

namespace P4\src\manager; 

class CommentManager extends DatabaseManager
{
    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT id, author, comment, created_date FROM comments WHERE post_id = ? ORDER BY created_date DESC';
        return $this->createQuery($sql, [$postId]);
    }
}
