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
    private $res1;

    /**
     * @var int
     */
    private $res2;


    public function __construct($op1 = null, $op2 = null, $op3 = null, $op4 = null, $res1 = null, $res2 = null)
    {
        $this
            ->setOp1($op1)
            ->setOp2($op2)
            ->setRes1($res1)
            ->setRes2($res2)
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
    public function getRes1()
    {
        return $this->res1;
    }
    /**
     * @param int $res
     * @return $this
     */
    public function setRes1($res)
    {
        $this->res1 = (int) $res;
        return $this;
    }
    public function getRes2()
    {
        return $this->res2;
    }
    /**
     * @param int $res
     * @return $this
     */
    public function setRes2($res)
    {
        $this->res2 = (int) $res;
        return $this;
    }
    public function sum()
    {
        $this->setRes1($this->getOp1()+ $this->getOp3());
        $this->setRes2($this->getOp2()+ $this->getOp4());

        $n = new Racional($this->getRes1(), $this->getRes2());


        return $n;
    }


}