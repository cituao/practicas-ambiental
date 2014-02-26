<?php
// src/Cituao/ExternoBundle/Form/Type/HojadevidaType.php
namespace Cituao\ExternoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExternoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('ci','text', array('label' => 'Cédula de identidad:','required' => true))	    
		->add('nombres','text', array('label' => 'Nombres:', 'required' => true))
        ->add('apellidos','text', array('label' => 'Apellidos:', 'required' => true))
        ->add('email', 'email',  array('label' => 'Email:',  'attr' => array('placeholder' => 'usuario@servidor'), 'required' => true ))
		->add('telefonoMovil','text', array('label' => 'Teléfono móvil:', 'required' => true))
		->add('telefonoFijo','text', array('label' => 'Teléfono fijo:'))
		->add('centro','entity', array('label' => 'Centro de prácticas', 'class' => 'CituaoCoordBundle:Centro' , 'property'=>'nombre', 'empty_value' => 'Seleccione un centro de prácticas'))		
		->add('cargo','text', array('label' => 'Cargo:', 'required' => true));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\ExternoBundle\Entity\Externo'
        ));
    }

    public function getName()
    {
        return 'externo';
    }
}
