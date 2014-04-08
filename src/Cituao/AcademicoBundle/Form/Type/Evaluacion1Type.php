<?php
// src/Cituao/AcademicoBundle/Form/Type/Evaluacion1Type.php
namespace Cituao\AcademicoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Evaluacion1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		        ->add('proceso','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '25')))
				->add('herramientas','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '25')))
				->add('dl21', 'text', array('required' => false, 'label' => 'Capacidad de gestión', 'read_only' => true))
				->add('dl22', 'text', array('required' => false, 'label' => 'Capacidad de negociacion', 'read_only' => true))	
				->add('dl23', 'text', array('required' => false, 'label' => 'Creatividad', 'read_only' => true))	
				->add('dl24', 'text', array('required' => false, 'label' => 'Dominio conceptual', 'read_only' => true))	
				->add('dl25', 'text', array('required' => false, 'label' => 'Iniciativa', 'read_only' => true))	
				->add('dl26', 'text', array('required' => false, 'label' => 'Organización - Planeación', 'read_only' => true))	
				->add('dl27', 'text', array('required' => false, 'label' => 'Proactividad', 'read_only' => true))	
				->add('dl28', 'text', array('required' => false, 'label' => 'Recursividad', 'read_only' => true))	
				->add('dl29', 'text', array('required' => false, 'label' => 'Responsabilidad', 'read_only' => true))
				->add('va31', 'text', array('required' => false, 'label' => 'Adáptación al rol profesioanl', 'read_only' => true))	
				->add('va32', 'text', array('required' => false, 'label' => 'Capacidad para recibir sugerencias', 'read_only' => true))	
				->add('va33', 'text', array('required' => false, 'label' => 'Capacidad para trabajar bajo presión', 'read_only' => true))	
				->add('va34', 'text', array('required' => false, 'label' => 'Capacidad para trabajar en equipo', 'read_only' => true))	
				->add('va35', 'text', array('required' => false, 'label' => 'Comportamiento ético', 'read_only' => true))	
				->add('va36', 'text', array('required' => false, 'label' => 'Compromiso', 'read_only' => true))	
				->add('va37', 'text', array('required' => false, 'label' => 'Presentación personal', 'read_only' => true))	
				->add('va38', 'text', array('required' => false, 'label' => 'Puntualidad', 'read_only' => true))	
				->add('va39', 'text', array('required' => false, 'label' => 'Relaciones interpersonales', 'read_only' => true))
				->add('comentarioExterno','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('aprobado', 'checkbox', array('required' => false, 'label' => 'Aprobado', 'read_only' => true))
				->add('comentarioAcademico','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500', 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('compromiso','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '10')));

		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\ExternoBundle\Entity\Evaluacion1', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'evaluacion1_academico';
    }
}
