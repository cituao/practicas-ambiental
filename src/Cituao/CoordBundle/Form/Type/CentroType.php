<?php
// src/Cituao/CoordBundle/Form/Type/CentroType.php
namespace Cituao\CoordBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CentroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('nombre','text', array('label' => 'Nombre del centro de práctica', 'max_length' => '50'))	    
		->add('direccion','textarea', array('label' => 'Dirección', 'max_length' => '255' ,  'attr' => array('placeholder' => 'Ingrese la dirección del centro de práctica', 'cols' => '90', 'rows' => '3')))
        ->add('telefono','text', array('label' => 'Teléfono' ,  'attr' => array('placeholder' => 'Ingrese el número telefónico')))
		->add('extension','text', array('label' => 'Extensión' ,  'attr' => array('placeholder' => 'Ingrese extensiones')))
		->add('email','text', array('label' => 'Email' ,  'attr' => array('placeholder' => 'Ingrese el email')))
		->add('url','text', array('label' => 'Direccion web',  'attr' => array('placeholder' => 'Ingrese la dirección web')));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\CoordBundle\Entity\Centro'
        ));
    }

    public function getName()
    {
        return 'centro';
    }
}
