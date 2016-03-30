<?php

class CommentsData
{
    private $comment;
    private $commentedBy;
    private $commentedDate;

    public function setComment($comment)
    {
        $this->comment=$comment;
    }

    public function setCommentedBy($commentedBy)
    {
        $this->commentedBy=$commentedBy;
    }

    public function setCommentedDate($commentedDate)
    {
        $this->commentedDate=$commentedDate;
    }

}