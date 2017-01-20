<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints AS Assert;

/**
 * gfd
 *
 * @ORM\Table(name="gfd")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\gfdRepository")
 */
class gfd
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     *
     * @var string
     * @Assert\Length(
     *     min="1",
     *     max="10"
     * )
     * @Assert\NotBlank(message="Name cannot be empty")
     *
     * @ORM\Column(name="usrger", type="string", length=255)
     */
    private $usrger;

    /**
     * @var int
     *
     * @ORM\Column(name="prigrid", type="integer")
     */
    private $prigrid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CreatedAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UpdatedAt", type="datetime")
     */
    private $updatedAt;

    /**
     * Product constructor
     * @param \DateTime $createdAt
     * @param \DateTime $updatedAt
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = $this->createdAt;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usrger
     *
     * @param string $usrger
     *
     * @return gfd
     */
    public function setUsrger($usrger)
    {
        $this->usrger = $usrger;

        return $this;
    }

    /**
     * Get usrger
     *
     * @return string
     */
    public function getUsrger()
    {
        return $this->usrger;
    }

    /**
     * Set prigrid
     *
     * @param integer $prigrid
     *
     * @return gfd
     */
    public function setPrigrid($prigrid)
    {
        $this->prigrid = $prigrid;

        return $this;
    }

    /**
     * Get prigrid
     *
     * @return int
     */
    public function getPrigrid()
    {
        return $this->prigrid;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return gfd
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return gfd
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

}

