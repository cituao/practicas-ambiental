<?php
// src/Cituao/CoordBundle/Form/Type/PracticanteType.php
namespace Cituao\CoordBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PracticanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('file')
		->add('ci','text', array('label' => 'Cédula de identidad'))	    
		->add('codigo','text', array('label' => 'Código'))
        ->add('apellidos','text', array('label' => 'Apellidos'))
		->add('nombres','text', array('label' => 'Nombres'))
        ->add('emailInstitucional', 'email',  array('required' => false, 'label' => 'Email institucional'))
        ->add('emailPersonal', 'email',  array('required' => false, 'label' => 'Email personal'))
		->add('telefonoMovil','text', array('required' => false, 'label' => 'Teléfono móvil'))
		->add('fechaMatriculacion', 'date', array('required' => true, 'label' => 'Fecha de matrícula', 'input' => 'datetime', 'widget' => 'choice', 'empty_value' => array('year' => 'Año', 'month' => 'Mes', 'day' => 'Día') ))
		->add('area','entity', array('required' => true, 'class' => 'CituaoCoordBundle:Area' , 'property'=>'area'));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\CoordBundle\Entity\Practicante', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'practicante';
    }
}
