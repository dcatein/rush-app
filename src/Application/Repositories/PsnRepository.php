<?php

namespace Src\Application\Repositories;

interface PsnRepository
{
    public function getOffers($offset = 0);
}
