<?php

namespace AppBundle\Event;
/**
 * Created by PhpStorm.
 * User: kriss
 * Date: 24/07/2018
 * Time: 15:41
 */
use AppBundle\Entity\Contact;
use Symfony\Component\EventDispatcher\Event;

class ContactEvent extends Event
{
    /*
     * @var Contact
     */
    private $contact;


    /**
     * ContactEvent constructor.
     * @param $contacts
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

}