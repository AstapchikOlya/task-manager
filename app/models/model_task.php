<?php

class Model_task extends Model {

    public function getTasksByStatus( $status_code ) {
        $query = $this->getConnection()->prepare('
            SELECT 
              `tasks`.`id`,
              `tasks`.`name`,
              `tasks`.`description`,
              `tasks`.`date`,
              COUNT(`comments`.`id`) AS count_comments
            FROM `tasks`
            LEFT JOIN `statuses`
              ON `tasks`.`status_id` = `statuses`.`id`
            LEFT JOIN `comments`
              ON `tasks`.`id` = `comments`.`task_id`
            WHERE `statuses`.`code` = ?
            GROUP BY `tasks`.`id`
            ORDER BY `tasks`.`date` DESC
        ');
        $query->execute( [ $status_code ] );
        $query->setFetchMode(PDO::FETCH_OBJ);

        return $query->fetchAll();
    }

    public function createNewTask( $task_data )
    {
        $query = $this->getConnection()->prepare('
            SELECT `id`
            FROM `statuses`
            WHERE `code` = ?
        ');
        $query->execute( [ $task_data['status_code'] ] );
        $status_id = $query->fetch()[0];

        $query = $this->getConnection()->prepare('
            INSERT INTO `tasks`
            (`name` , `description`, `date`, `status_id`)
            VALUES (?, ?, ?, ?)
        ');
        $query->execute( [
            $task_data['name'],
            $task_data['description'],
            date( "Y-m-d H:i:s" ),
            $status_id
        ] );
    }

    public function getTaskDetails( $task_id ) {
        $query = $this->getConnection()->prepare('
            SELECT
              `tasks`.`id`,
              `tasks`.`name`,
              `tasks`.`description`,
              `tasks`.`date`,
              `statuses`.`code`
            FROM `tasks`
            LEFT JOIN `statuses`
              ON `tasks`.`status_id` = `statuses`.`id`
            WHERE `tasks`.`id` = ?
        ');
        $query->execute( [ $task_id ] );
        $query->setFetchMode(PDO::FETCH_OBJ);

        return $query->fetchAll()[0];
    }

    public function getTaskComments( $task_id ) {
        $query = $this->getConnection()->prepare('
            SELECT
              `comments`.`content`,
              `comments`.`date`
            FROM `comments`
            LEFT JOIN `tasks`
              ON `tasks`.`id` = `comments`.`task_id`
            WHERE `tasks`.`id` = ?
            ORDER BY `comments`.`date` DESC
        ');
        $query->execute( [ $task_id ] );
        $query->setFetchMode(PDO::FETCH_OBJ);

        return $query->fetchAll();
    }

    public function editTask( $task_data )
    {
        $query = $this->getConnection()->prepare('
            UPDATE `tasks`
            SET
              `tasks`.`name` = ?,
              `tasks`.`description` = ?,
              `tasks`.`status_id` = (
                  SELECT `statuses`.`id`
                  FROM `statuses`
                  WHERE `statuses`.`code` = ?
              )
            WHERE `tasks`.`id` = ?
        ');
        $query->execute( [
            $task_data['name'],
            $task_data['description'],
            $task_data['status_code'],
            $task_data['task_id']
        ] );
    }

}
