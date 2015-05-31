<?php namespace App\Libraries\Repositories;
 
use App\Libraries\Repositories\Eloquent\Repository;
 
class TaskRepository extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Task';
    }
}