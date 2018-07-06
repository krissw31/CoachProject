<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsletterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null, ["label"=>"Titre:"])
            ->add('content',null, ["label"=>"Contenu:"])
            ->add('send',null,["label"=>"Voulez-vous l'envoyer aux utilisateurs une fois créée ?"])
            ->add('validate',SubmitType::class,["label"=>"Créer", "attr"=>["class"=>"btn btn-info"]]);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Newsletter'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_newsletter';
    }


}
