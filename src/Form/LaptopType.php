<?php

namespace App\Form;

use App\Entity\Laptop;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LaptopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ramMemory')
            ->add('ramTechnology')
            ->add('ramFrequency')
            ->add('hardDisk')
            ->add('hardDiskTechnology')
            ->add('processorMaker')
            ->add('processorModel')
            ->add('processorVelocity')
            ->add('processorCore')
            ->add('processorCache')
            ->add('graphicMaker')
            ->add('graphicModel')
            ->add('graphicTechnology')
            ->add('graphicCapacity')
            ->add('graphicInterface')
            ->add('usb20')
            ->add('usb30')
            ->add('hdmi')
            ->add('dvi')
            ->add('bluetooht')
            ->add('bluetoohtVersion')
            ->add('screenResolution')
            ->add('screenSize')
            ->add('screenFrequency')
            ->add('baterryCapacity')
            ->add('baterryChargeTime')
            ->add('idPorduct')
            ->add('idSubcategory')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Laptop::class,
        ]);
    }
}
