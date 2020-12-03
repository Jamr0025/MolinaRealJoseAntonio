<?php

namespace Hiberus\Molina\Model\ResourceModel\Exam;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hiberus\Molina\Model;

/**
 * Class Collection
 * @package Hiberus\Molina\Model\ResourceModel\Exam
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model\Exam::class, Model\ResourceModel\Exam::class);
    }
}
