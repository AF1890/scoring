<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnage
 */
class Personnage
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $xP;

    /**
     * @var int
     */
    private $forces;

    /**
     * @var int
     */
    private $puissanceArme;

    /**
     * @var int
     */
    private $pV;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set xP
     *
     * @param integer $xP
     * @return Personnage
     */
    public function setXP($xP)
    {
        $this->xP = $xP;

        return $this;
    }

    /**
     * Get xP
     *
     * @return integer 
     */
    public function getXP()
    {
        return $this->xP;
    }

    /**
     * Set forces
     *
     * @param integer $forces
     * @return Personnage
     */
    public function setForces($forces)
    {
        $this->forces = $forces;

        return $this;
    }

    /**
     * Get forces
     *
     * @return integer 
     */
    public function getForces()
    {
        return $this->forces;
    }

    /**
     * Set puissanceArme
     *
     * @param integer $puissanceArme
     * @return Personnage
     */
    public function setPuissanceArme($puissanceArme)
    {
        $this->puissanceArme = $puissanceArme;

        return $this;
    }

    /**
     * Get puissanceArme
     *
     * @return integer 
     */
    public function getPuissanceArme()
    {
        return $this->puissanceArme;
    }

    /**
     * Set pV
     *
     * @param integer $pV
     * @return Personnage
     */
    public function setPV($pV)
    {
        $this->pV = $pV;

        return $this;
    }

    /**
     * Get pV
     *
     * @return integer 
     */
    public function getPV()
    {
        return $this->pV;
    }
}
