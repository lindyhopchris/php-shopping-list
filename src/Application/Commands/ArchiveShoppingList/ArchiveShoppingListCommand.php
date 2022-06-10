<?php

declare(strict_types=1);

namespace Lindyhopchris\ShoppingList\Application\Commands\ArchiveShoppingList;

use Lindyhopchris\ShoppingList\Persistance\ShoppingListRepositoryInterface;

class ArchiveShoppingListCommand implements ArchiveShoppingListCommandInterface
{
    /**
     * @var ShoppingListRepositoryInterface
     */
    private ShoppingListRepositoryInterface $repository;

    /**
     * @param ShoppingListRepositoryInterface $repository
     */
    public function __construct(ShoppingListRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function execute(ArchiveShoppingListModel $model): void
    {
        $list = $this->repository->findOrFail(
            $model->getList(),
        );

        $this->$list->isArchived();

        $this->repository->store($list);
    }
}