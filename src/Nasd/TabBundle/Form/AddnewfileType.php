<?php

namespace Nasd\TabBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AddnewfileType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('pathfile')
        ;
    }

    public function getName()
    {
        return 'nasd_tabbundle_addnewfiletype';
    }
}
