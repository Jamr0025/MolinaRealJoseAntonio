<?php

namespace Hiberus\Molina\Model;

use Hiberus\Molina\Api\Data;
use Hiberus\Molina\Api\Data\ExamInterfaceFactory;
use Hiberus\Molina\Api\ExamRepositoryInterface;
use Hiberus\Molina\Api\Data\ExamSearchResultsInterface;
use Hiberus\Molina\Model\ResourceModel;
use Hiberus\Molina\Model\ResourceModel\Exam\Collection;
use Hiberus\Molina\Model\ResourceModel\Exam\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;




/**
 * Class ExamRepository
 * @package Hiberus\Molina\Model
 */
class ExamRepository implements ExamRepositoryInterface
{
    /**
     * @var \Hiberus\Molina\Model\ResourceModel\Exam
     */
    private $resourceExam;

    /**
     * @var ExamInterfaceFactory
     */
    private $examFactory;

    /**
     * @var CollectionFactory
     */
    private $examCollectionFactory;

    /**
     * @var Data\ExamSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param \Hiberus\Molina\Model\ResourceModel\Exam $resourceExam
     * @param ExamInterfaceFactory $examFactory
     * @param CollectionFactory $examCollectionFactory
     * @param Data\ExamSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    function __construct(
        ResourceModel\Exam $resourceExam,
        ExamInterfaceFactory $examFactory,
        CollectionFactory $examCollectionFactory,
        Data\ExamSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resourceExam = $resourceExam;
        $this->examFactory = $examFactory;
        $this->examCollectionFactory = $examCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param Data\ExamInterface $exam
     * @return Data\ExamInterface
     * @throws CouldNotSaveException
     */
    public function save(Data\ExamInterface $exam)
    {
        try {
            $this->resourceExam->save($exam);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $exam;
    }

    /**
     * @param int $examId
     * @return Data\ExamInterface
     * @throws NoSuchEntityException
     */
    public function getById($examId)
    {
        //el factory va a crear una instancia de author, que no sera un author de verdad, si no un factory
        $exam = $this->examFactory->create();

        $this->resourceExam->load($exam, $examId);
        if (!$exam->getId()) {
            throw new NoSuchEntityException(__('exam with id "%1" does not exist', $examId));
        }
        return $exam;
    }

    /**
     * @param Data\ExamInterface $exam
     * @return bool|Data\ExamInterface
     * @throws CouldNotSaveException
     */
    public function delete(Data\ExamInterface $exam)
    {
        try {
            $this->resourceExam->delete($exam);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $exam;
    }

    /**
     * @param int $examId
     * @return bool|Data\ExamInterface
     * @throws CouldNotSaveException
     * @throws NoSuchEntityException
     */
    public function deleteById($examId)
    {
        return $this->delete($this->getById($examId));
    }

    /**
     * Retrieve Exam matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return ExamSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var Collection $collection */
        $collection = $this->examCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var Data\ExamSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
