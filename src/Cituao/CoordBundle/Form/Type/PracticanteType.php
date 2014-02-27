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
        ->add('emailInstitucional', 'email',  array('label' => 'Email institucional' ,  'attr' => array('placeholder' => 'usuario@servidor')))
        ->add('emailPersonal', 'email',  array('label' => 'Email personal',  'attr' => array('placeholder' => 'usuario@servidor')))
		->add('telefonoMovil','text', array('label' => 'Teléfono móvil'))
		->add('telefonoMovil','text', array('label' => 'Teléfono móvil'))
		->add('fechaMatriculacion', 'date', array('label' => 'Fecha de matrícula', 'input' => 'datetime', 'widget' => 'choice'))
		->add('area','entity', array('class' => 'CituaoCoordBundle:Area' , 'property'=>'area'));

		//->add('ci','text', array('label' => 'Cédula de identidad','read_only'=>'true'))    
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\CoordBundle\Entity\Practicante'
        ));
    }

    public function getName()
    {
        return 'practicante';
    }
}
