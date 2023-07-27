<?php

namespace app\models;

class CloudApi
{
    public function getAccessToken()
    {
        // логика получения токена доступа из CloudApi
    }

    public function refreshAccessToken(string $refreshToken)
    {
        // логика обновления токена доступа с помощью refreshToken
    }
    
    public function lockInit(array $lockData)
    {
        // логика инициализации замка в CloudApi с помощью lockData
    }
    
    public function getPasscode(int $lockId, int $period)
    {
        // логика получения кода к замку TTLock на заданный период времени
    }
    
    // другие методы работы с CloudApi
}