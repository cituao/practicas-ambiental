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
		->add('nombre','text', array('required' => true, 'label' => 'Nombre del centro de práctica', 'max_length' => '50' ,  'attr' => array('placeholder' => 'Ingrese nombre del centro')))	    
		->add('direccion','textarea', array('required' => false, 'label' => 'Dirección', 'max_length' => '255' ,  'attr' => array('placeholder' => 'Ingrese la dirección del centro de práctica', 'cols' => '90', 'rows' => '3')))
        ->add('telefono','text', array('required' => false, 'label' => 'Teléfono' ,  'attr' => array('placeholder' => 'Ingrese el número telefónico')))
		->add('extension','text', array('required' => false, 'label' => 'Extensión' ,  'attr' => array('placeholder' => 'Ingrese extensiones')))
		->add('email','text', array('required' => false , 'label' => 'Email' ,  'attr' => array('placeholder' => 'Ingrese el email')))
		->add('url','text', array('required' => false, 'label' => 'Direccion web',  'attr' => array('placeholder' => 'Ingrese la dirección web')));
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
