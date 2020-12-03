<?php

namespace Hiberus\Molina\Plugin;

use Hiberus\Molina\Api\Data\ExamInterface;
use Hiberus\Molina\Api\Data\ExamSearchResultsInterface;
use Hiberus\Molina\Api\ExamRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class PluginExample
 * @package Hiberus\Molina\Plugin
 */
class ExamPlugin
{
    /**
     * @param ExamRepositoryInterface $subject
     * @param ExamSearchResultsInterface $result
     * @return ExamSearchResultsInterface
     */
    public function afterGetList(
        ExamRepositoryInterface $subject,
        $result
    ) {
        /** @var ExamInterface $first */
        $notaCorte = 5;
        foreach ($result->getItems() as $exam):
            if($exam->getMark() < $notaCorte){
                $exam->setMark('4.9');
            }
        endforeach;

        return $result;
    }
}
