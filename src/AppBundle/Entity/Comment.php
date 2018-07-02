<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 28/06/2018
 * Time: 15:24
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 * @package AppBundle\Entity
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="string",  length=150, nullable=false)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="text",  length=150, nullable=false)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validation;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Coaching", inversedBy="comment")
     */
    private $commentCoach;




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
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return Comment
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
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
     * Set validation
     *
     * @param boolean $validation
     *
     * @return Comment
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Get validation
     *
     * @return boolean
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set commentCoach
     *
     * @param \AppBundle\Entity\Coaching $commentCoach
     *
     * @return Comment
     */
    public function setCommentCoach(\AppBundle\Entity\Coaching $commentCoach = null)
    {
        $this->commentCoach = $commentCoach;

        return $this;
    }

    /**
     * Get commentCoach
     *
     * @return \AppBundle\Entity\Coaching
     */
    public function getCommentCoach()
    {
        return $this->commentCoach;
    }
}
