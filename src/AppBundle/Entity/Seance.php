<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 28/06/2018
 * Time: 16:07
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="seance")
 * @package AppBundle\Entity
 */
class Seance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $etape;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Coaching", inversedBy="seance")
     */
    private $typeSeance;


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
     * Set name
     *
     * @param string $name
     *
     * @return Seance
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Seance
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set etape
     *
     * @param string $etape
     *
     * @return Seance
     */
    public function setEtape($etape)
    {
        $this->etape = $etape;

        return $this;
    }

    /**
     * Get etape
     *
     * @return string
     */
    public function getEtape()
    {
        return $this->etape;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Seance
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set typeSeance
     *
     * @param \AppBundle\Entity\Coaching $typeSeance
     *
     * @return Seance
     */
    public function setTypeSeance(\AppBundle\Entity\Coaching $typeSeance = null)
    {
        $this->typeSeance = $typeSeance;

        return $this;
    }

    /**
     * Get typeSeance
     *
     * @return \AppBundle\Entity\Coaching
     */
    public function getTypeSeance()
    {
        return $this->typeSeance;
    }
}
