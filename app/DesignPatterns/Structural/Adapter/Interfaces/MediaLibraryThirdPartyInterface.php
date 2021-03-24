<?php


namespace App\DesignPatterns\Structural\Adapter\Interfaces;


interface MediaLibraryThirdPartyInterface
{
    public function addMedia($pathToFile): array;

    public function getMedia($fileCode): string;
}
