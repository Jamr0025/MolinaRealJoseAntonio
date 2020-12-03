<?php

namespace Hiberus\Molina\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Config
 * @package Hiberus\Molina\Helper
 */
class Config extends AbstractHelper
{
    const   XML_PATH_NUMEXAM=   'hiberus_molina/general_config_exam/numExam';
    const   XML_PATH_MINNOTE =   'hiberus_molina/general_config_exam/minNote';

    /**
     * @return int numero de examenes por pagina
     */
    public function getNumOfExams()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_NUMEXAM
        );
    }

    /**
     * @return int nota minima aprobado
     */
    public function getMinNote()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MINNOTE
        );
    }
}
