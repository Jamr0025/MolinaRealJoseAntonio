<?php

namespace Hiberus\Molina\Api;

use Hiberus\Molina\Api\Data\ExamInterface;
use Hiberus\Molina\Api\Data\ExamSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Interface ExamRepositoryInterface
 * @package Hiberus\Molina\Api
 */
interface ExamRepositoryInterface
{
    /**
     * Save a exam
     *
     * @param \Hiberus\Molina\Api\Data\ExamInterface $exam
     * @return \Hiberus\Molina\Api\Data\ExamInterface
     */
    public function save(\Hiberus\Molina\Api\Data\ExamInterface $exam);

    /**
     * Get exam by an Id
     *
     * @param int $examId
     * @return \Hiberus\Molina\Api\Data\ExamInterface
     */
    public function getById($examId);

    /**
     * Retrieve exams matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Hiberus\Molina\Api\Data\ExamSearchResultsInterface ExamSearchResultsInterface
     * @throws LocalizedException
     */
    //si el search criteria lo metemos vacio nos traera todos los datos
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete a exam
     *
     * @param \Hiberus\Molina\Api\Data\ExamInterface $exam
     * @return \Hiberus\Molina\Api\Data\ExamInterface
     */
    public function delete(\Hiberus\Molina\Api\Data\ExamInterface $exam);

    /**
     * Delete a exam by an Id
     *
     * @param int $examId
     * @return \Hiberus\Molina\Api\Data\ExamInterface
     */
    public function deleteById($examId);
}
