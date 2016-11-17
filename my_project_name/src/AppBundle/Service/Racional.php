<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 15/11/16
 * Time: 19:48
 */

namespace AppBundle\Service;


class Racional
{
    /**
     * @var int
     */
    private $op1;
    /**
     * @var int
     */
    private $op2;

    /**
     * Racional constructor.
     * @param $op1
     * @param $op2
     */
    public function __construct($op1, $op2)
    {
        $this->op1 = $op1;
        $this->op2 = $op2;
    }


    /**
     * @return int
     */
    public function getOp1()
    {
        return $this->op1;
    }

    /**
     * @param mixed $op1
     */
    public function setOp1($op1)
    {
        $this->op1 = $op1;
    }

    /**
     * @return int
     */
    public function getOp2()
    {
        return $this->op2;
    }

    /**
     * @param mixed $op2
     */
    public function setOp2($op2)
    {
        $this->op2 = $op2;
    }


    /*public function setOp2($op2)
    {
        $this->op2 = $op2;
    } */


    public function __toString()
    {
     return $this-> getOp2()."hola";
    }

}