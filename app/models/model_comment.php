<?php

class Model_comment extends Model {

    public function addNewComment( $comment_data )
    {
        $query = $this->getConnection()->prepare('
            INSERT INTO `comments`
            (`task_id`, `content` , `date`)
            VALUES (?, ?, ?)
        ');
        $query->execute( [
            $comment_data['task_id'],
            $comment_data['content'],
            date( "Y-m-d H:i:s" )
        ] );
    }

}
