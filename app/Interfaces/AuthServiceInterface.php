<?php
namespace App\Interfaces;

interface AuthServiceInterface{
    public static function login(array $credentials): bool;
    public static function logout(): void;
}