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
		->add('nombre','text', array('required' => true, 'label' => 'Nombre del centro de práctica', 'max_length' => '50'))	    
		->add('direccion','textarea', array('required' => false, 'label' => 'Dirección', 'max_length' => '255' ,  'attr' => array('cols' => '90', 'rows' => '3')))
        ->add('telefono','text', array('required' => false, 'label' => 'Teléfono'))
		->add('extension','text', array('required' => false, 'label' => 'Extensión'))
		->add('email','text', array('required' => false , 'label' => 'Email'))
		->add('url','text', array('required' => false, 'label' => 'Direccion web'));
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
