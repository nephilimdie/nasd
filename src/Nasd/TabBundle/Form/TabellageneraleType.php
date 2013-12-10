<?php

namespace Nasd\TabBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TabellageneraleType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('InventaryNumber')
            ->add('Slab')
            ->add('SubjectIconography')
            ->add('King')
            ->add('Site')
            ->add('Palace')
            ->add('RoomCourt')
            ->add('Wall')
            ->add('Inscription')
            ->add('MuseumCollection')
            ->add('City')
            ->add('Images')
            ->add('Bibliography')
            ->add('pathfile')
        ;
    }

    public function getName()
    {
        return 'nasd_tabbundle_tabellageneraletype';
    }
}
