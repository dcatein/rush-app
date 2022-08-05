<?php

namespace Src\Infrastructure\File;

use Src\Application\Repositories\FileRepository;

class JsonFileRepository implements FileRepository
{

    public function getFile(string $name)
    {
        return fopen($name, 'w');
    }

    public function addNewLine($file, $line)
    {
        fwrite($file, $line);
    }

    public function closeFile($file)
    {
        fclose($file);
    }
}
