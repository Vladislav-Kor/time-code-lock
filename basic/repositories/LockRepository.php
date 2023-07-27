<?php

namespace app\repositories;

use app\models\Lock;

class LockRepository
{
    public function create(Lock $lock)
    {
        // логика создания замка в базе данных
    }

    public function update(Lock $lock)
    {
        // логика обновления замка в базе данных
    }

    public function delete(Lock $lock)
    {
        // логика удаления замка из базы данных
    }

    public function findById(int $id) : ?Lock
    {
        // логика поиска замка по id
    }
    
    // другие методы CRUD
}