<?php

namespace Hiberus\Molina\Block\Exam;
use Hiberus\Molina\Api\Data\ExamRepository;
use Hiberus\Molina\Helper\Config;
use Psr\log\LoggerInterface;

class ExamList extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Hiberus\Molina\Api\ExamRepository $examRepository;
     */
    private $examRepository;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteria
     */
    private $searchCriteria;

    /**
     * @var \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
     */
    private $sortOrderBuilder;
    /**
     * @var \Hiberus\Molina\Helper\Config $config
     */
    private $config;
    /**
     * @var \Psr\log\LoggerInterface $logger
     */
    private $logger;

    public function __construct(
        \Hiberus\Molina\Api\ExamRepositoryInterface $examRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder,
        \Magento\Framework\View\Element\Template\Context $context,
        \Hiberus\Molina\Helper\Config $config,
        \Psr\log\LoggerInterface $logger,
        array $data = []
    ){
        $this->examRepository = $examRepository;
        $this->searchCriteria = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->config=$config;
		$this->logger=$logger;
        parent::__construct($context, $data);
    }

    /**
     * Return list of Exam
     * @return \Hiberus\Molina\Api\Data\Exam
     */
    public function getExams()
    {
        $limit = $this->config->getNumOfExams();
        // Get product list
        $examList = $this->examRepository->getList(
            $this->searchCriteria
                ->addSortOrder($this->sortOrderBuilder->setField('Mark')->setDirection('desc')->create())
                ->setPageSize($limit)
                ->create()

        )->getItems();

        return $examList;
    }
    /**
     * write on hiberus_molina.log
     * @param int $msg
     * @param decimal $media
     */
    public function writeLog($numOcurrecias,$media){
        $this->logger->debug("Numero de usuarios mostrados: ".$numOcurrecias." Nota media: ".$media);
    }

}
