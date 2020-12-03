<?php

namespace Hiberus\Molina\Setup\Patch\Data;

use Hiberus\Molina\Api\Data\ExamInterface;
use Hiberus\Molina\Api\Data\ExamInterfaceFactory;
use Hiberus\Molina\Api\ExamRepositoryInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\HTTP\Client\CurlFactory;

/**
 * Class PopulateDataModel
 * @package Hiberus\Molina\Setup\Patch\Data
 */
class PopulateDataModel implements DataPatchInterface
{
    const   NUMBER_OF_EXAMS =   10;

    /**
     * @var ExamRepositoryInterface
     */
    private $examRepository;

    /**
     * @var ExamInterfaceFactory
     */
    private $examFactory;


    /**
     * @var CurlFactory
     */
    private $curlFactory;

    /**
     * PopulateDataModel constructor.
     * @param ExamRepositoryInterface $examRepository
     * @param ExamInterfaceFactory $examFactory
     * @param CurlFactory $curlFactory
     */
    public function __construct(
        ExamRepositoryInterface $examRepository,
        ExamInterfaceFactory $examFactory,
        CurlFactory $curlFactory
    ) {
        $this->examRepository = $examRepository;
        $this->examFactory = $examFactory;
        $this->curlFactory = $curlFactory;
    }

    /**
     * @return DataPatchInterface|void
     */
    public function apply()
    {
        $this->populateData();
    }

    /**
     * Populate Data Model
     */
    private function populateData()
    {
        $this->populateExams();
    }

    /**
     * Populate Exams Data
     */
    private function populateExams()
    {
        for ($i = 0; $i < self::NUMBER_OF_EXAMS; $i++) {

            /** @var ExamInterface $exam*/
            $exam = $this->examFactory->create();

            $exam->setFirstName('firstname '.$i)
                ->setLastName('lastname '.$i)
                ->setMark(mt_rand (0*100, 10*100) / 100)
            ;

            $this->examRepository->save(
                $exam
            );
        }
    }

    /**
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return string[]
     */
    public function getAliases()
    {
        return [];
    }
}
