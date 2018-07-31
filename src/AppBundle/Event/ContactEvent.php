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
     * @var Contacts
     */
    private $contacts;

    /**
     * ContactEvent constructor.
     * @param $contacts
     */
    public function __construct(Contact $contacts)
    {
        $this->contacts = $contacts;
    }


}