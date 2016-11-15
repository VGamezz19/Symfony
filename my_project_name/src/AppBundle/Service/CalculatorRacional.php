<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 15/11/16
 * Time: 19:38
 */

namespace AppBundle\Service;


class CalculatorRacional
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
     * @var int
     */
    private $res;
    public function __construct($op1 = null, $op2 = null, $res = null, $op3 = null, $op4 = null)
    {
        $this
            ->setOp1($op1)
            ->setOp2($op2)
            ->setRes($res)
            ->setOp3($op3)
            ->setOp4($op4);
    }
    /**
     * @return int
     */
    public function getOp2()
    {
        return $this->op2;
    }
    /**
     * @return int
     */
    public function getOp3()
    {
        return $this->op3;
    }

    /**
     * @return int
     */
    public function getOp4()
    {
        return $this->op4;
    }

    /**
     * @param int $op1
     * @return $this
     */
    public function setOp1($op1)
    {
        $this->op1 = (int) $op1;
        return $this;
    }

    /**
     * @param int $op3
     * @return $this
     */
    public function setOp3($op3)
    {
        $this->op3 = (int) $op3;
        return $this;
    }

    /**
     * @param int $op4
     * @return $this
     */
    public function setOp4($op4)
    {
        $this->op4 = (int) $op4;
        return $this;
    }
    /**
     * @param int $op2
     * @return $this
     */
    public function setOp2($op2)
    {
        $this->op2 = (int) $op2;
        return $this;
    }
    /**
     * @return int
     */
    public function getOp1()
    {
        return $this->op1;
    }
    /**
     * @return int
     */
    public function getRes()
    {
        return $this->res;
    }
    /**
     * @param int $res
     * @return $this
     */
    public function setRes($res)
    {
        $this->res = (int) $res;
        return $this;
    }
    public function sum()
    {
        $n = new Racional($this->setRes($this->getOp1()+ $this->getOp2()), $this->setRes($this->getOp3()+ $this->getOp4()));

        return $n;
    }

    public function res()
    {
        $this->setRes($this->getOp1()- $this->getOp2());
    }
}