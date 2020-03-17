<?php

class Model_api extends Model {

    public function saveLoadedTasks( $loaded_tasks ) {

        $query_status = $this->getConnection()->query('
            SELECT * FROM `statuses`
        ');

        $query_status->setFetchMode(PDO::FETCH_OBJ);
        $all_statuses = $query_status->fetchAll();
        $statuses = [];

        foreach ( $all_statuses as $status ) {
            $statuses[ $status->id ] = $status->code;
        }

        $query = $this->getConnection()->prepare('
            INSERT INTO `tasks`
            (`name`, `description`, `date`, `status_id`)
            VALUES (?, ?, ?, ?)
        ');

        foreach ( $loaded_tasks as $task ) {
            $status_id = array_search( $task->status_code, $statuses );

            $query->execute( [
                $task->name,
                $task->description,
                $task->date,
                $status_id
            ] );

            $task_id = $this->getConnection()->lastInsertId();

            if ( ! empty( $task->comments ) ) {
                $this->saveLoadedComments( $task_id, $task->comments );
            }

        }

    }

    public function saveLoadedComments( $task_id, $comments ) {

        $query_comments = $this->getConnection()->prepare('
            INSERT INTO `comments`
            (`task_id`, `content`, `date`)
            VALUES (?, ?, ?)
        ');

        foreach ( $comments as $comment ){
            $query_comments->execute( [
                $task_id,
                $comment->content,
                $comment->date
            ] );
        }

    }

}
