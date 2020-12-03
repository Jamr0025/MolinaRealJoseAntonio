<?php

namespace Hiberus\Molina\Api\Data;

/**
 * Interface ExamInterface
 * @package Hiberus\Molina\Api\Data
 */
interface ExamInterface
{
    const TABLE = 'hiberus_exam';
    const ID_EXAM = 'id_exam';
    const FIRST_NAME = 'firstname';
    const LAST_NAME = 'lastname';
    const MARK= 'mark';

    /**
     * Get the Piedra ID
     *
     * @return int
     */
    public function getId();

    /**
     * Set the examen_restul Id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get  Name
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Set  firstName
     *
     * @param string $firstname
     * @return $this
     */
    public function setFirstName($firstname);

    /**
     * Get examen_restul lastName
     *
     * @return int
     */
    public function getLastName();

    /**
     * Set lastName
     *
     * @param int $lastname
     * @return $this
     */
    public function setLastName($lastname);

    /**
     * Get Mark
     *
     * @return float
     */
    public function getMark();

    /**
     * Set Mark
     *
     * @param string $mark
     * @return $this
     */
    public function setMark($mark);

}
