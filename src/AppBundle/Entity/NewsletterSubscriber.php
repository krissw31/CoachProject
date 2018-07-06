<?php
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 25/06/2018
 * Time: 15:07
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="newsletterSub")
 * @package AppBundle\Entity
 */
class NewsletterSubscriber
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="string", length=150)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Contact")
     *@ORM\JoinColumn(name="contact", nullable=true)
     */
    private $contact;



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
     * Set email
     *
     * @param string $email
     *
     * @return NewsletterSubscriber
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set contact
     *
     * @param \AppBundle\Entity\Contact $contact
     *
     * @return NewsletterSubscriber
     */
    public function setContact(\AppBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \AppBundle\Entity\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }
}
