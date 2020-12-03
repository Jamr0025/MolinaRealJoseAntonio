<?php

namespace Hiberus\Molina\Model;

use Hiberus\Molina\Api\Data\ExamInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Exam
 * @package Hiberus\Molina\Model
 */
class Exam extends AbstractModel implements ExamInterface
{

    protected function _construct()
    {
        $this->_init(\Hiberus\Molina\Model\ResourceModel\Exam::class);
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->_getData(self::ID_EXAM);
    }

    /**
     * @param int|mixed $id
     * @return ExamInterface|Exam|AbstractModel
     */
    public function setId($id)
    {
        return $this->setData(self::ID_EXAM, $id);
    }

    /**
     * @return mixed|string
     */
    public function getFirstName()
    {
        return $this->_getData(self::FIRST_NAME);
    }
    /**
     * @param string $firstname
     * @return ExamInterface|Exam
     */
    public function setFirstName($firstname)
    {
        return $this->setData(self::FIRST_NAME, $firstname);
    }

    /**
     * @return int
     */
    public function getLastName()
    {
        return $this->_getData(self::LAST_NAME);
    }

    /**
     * @param string $lastname
     * @return Examnterface|Exam
     */
    public function setLastName($lastname)
    {
        return $this->setData(self::LAST_NAME, $lastname);
    }

    /**
     * @return float
     */
    public function getMark()
    {
        return $this->_getData(self::MARK);
    }

    /**
     * @param float $mark
     * @return ExamInterface|Exam
     */
    public function setMark($mark)
    {
        return $this->setData(self::MARK, $mark);
    }

}

