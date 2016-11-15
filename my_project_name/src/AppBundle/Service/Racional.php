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
    private $op1;
    private $op2;
    public function __construct($op1 , $op2 )
    {
        $this
            ->setOp1($op1)
            ->setOp2($op2);

    }

    /**
     * @return mixed
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
     * @return mixed
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

}