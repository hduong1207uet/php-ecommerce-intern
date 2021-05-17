<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
    * Get all record
    * @param
    * @return \App\Eloquent\Models
    */
    public function getAll();

    /**
    * Find record by id
    * @param  int $id
    * @return \App\Eloquent\Model
    */
    public function find($id);

    /**
    * Create record
    * @param
    * @return \App\Eloquent\Model
    */
    public function create($attributes = []);

    /**
    * Update record
    * @param  int $id,
    * @param  array $attributes,
    * @return \App\Eloquent\Model or false
    */
    public function update($id, $attributes = []);

    /**
    * Delete record
    * @param  int $id,
    * @return boolean
    */
    public function delete($id);
}
