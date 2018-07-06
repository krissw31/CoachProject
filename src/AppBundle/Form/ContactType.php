<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType //classe qui permet de générer un formulaire
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('name', null,["label"=>"Nom:"])
            ->add('prenom', null, ["label"=>"Prénom:"])
            ->add('email', null, ["label"=>"Email:"])
            ->add('title', null, ["label"=>"Sujet:"])
            ->add('comment', null, ["label"=>"Contenu"])
            ->add('sendNews', null, ["label"=>"Recevoir la Newsletter"])
            ->add("validate",SubmitType::class, ["label"=>"Envoyer", "attr"=>["class"=>"btn btn-info"]]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
