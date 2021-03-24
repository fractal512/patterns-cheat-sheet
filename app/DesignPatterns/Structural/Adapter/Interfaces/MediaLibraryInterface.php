<?php


namespace App\DesignPatterns\Structural\Adapter\Interfaces;


interface MediaLibraryInterface
{
    public function upload($pathToFile): array;

    public function get($fileCode): string;
}
