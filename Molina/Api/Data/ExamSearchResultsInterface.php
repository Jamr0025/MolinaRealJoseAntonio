<?php

namespace Hiberus\Molina\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PiedraSearchResultsInterface
 * @package Hiberus\Molina\Api\Data
 */
interface ExamSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get exam list.
     *
     * @return Hiberus\Molina\Api\Data\ExamInterface[]
     */
    public function getItems();

    /**
     * Set exam list.
     *
     * @param Hiberus\Molina\Api\Data\ExamInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
