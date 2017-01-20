<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/10/2016
 * Time: 17:27
 */
namespace AppBundle\Service;
class Calculator
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
    public function __construct($op1 = null, $op2 = null, $res = null)
    {
        $this
            ->setOp1($op1)
            ->setOp2($op2)
            ->setRes($res);
    }
    /**
     * @return int
     */
    public function getOp2()
    {
        return $this->op2;
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
        $this->setRes($this->getOp1()+ $this->getOp2());
    }

    public function res()
    {
        $this->setRes($this->getOp1()- $this->getOp2());
    }
}