<?php


namespace App\DesignPatterns\Structural\Adapter\Classes;


use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryThirdPartyInterface;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

class MediaLibraryThirdParty implements MediaLibraryThirdPartyInterface
{
    use DispatchesLaravelLog;

    public function addMedia($pathToFile): array
    {
        $this->logMessage(__METHOD__);

        $path = __DIR__ . '/uploads/' . $pathToFile;
        $hash = md5($path);
        return [
            'code' => $hash,
            'path' => $path
        ];
    }

    public function getMedia($fileCode): string
    {
        $this->logMessage(__METHOD__);
        $this->logMessage('Retrieving file with code: ' . $fileCode);

        return $fileCode;
    }
}
