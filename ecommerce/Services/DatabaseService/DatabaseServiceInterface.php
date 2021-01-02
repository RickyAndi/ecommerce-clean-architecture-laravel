<?php


namespace ECommerce\Services\DatabaseService;


interface DatabaseServiceInterface
{
    public function startTransaction(): void;

    public function commitTransaction(): void;

    public function rollbackTransaction(): void;
}
