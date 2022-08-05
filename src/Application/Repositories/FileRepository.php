<?php

namespace Src\Application\Repositories;

interface FileRepository
{
    public function getFile(string $name);

    public function addNewLine($file, $line);

    public function closeFile($file);
}
