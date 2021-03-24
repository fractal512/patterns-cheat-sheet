<?php


namespace App\DesignPatterns\Structural\Adapter\Classes;


use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryInterface;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

class MediaLibrarySelfWritten implements MediaLibraryInterface
{
    use DispatchesLaravelLog;

    public function upload($pathToFile): array
    {
        $this->logMessage(__METHOD__);

        $path = __DIR__ . '/uploads/' . $pathToFile;
        $hash = md5($path);
        return [
            'code' => $hash,
            'path' => $path
        ];
    }

    public function get($fileCode): string
    {
        $this->logMessage(__METHOD__);
        $this->logMessage('Retrieving file with code: ' . $fileCode);

        return $fileCode;
    }
}
