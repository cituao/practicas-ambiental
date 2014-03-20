<?php
// src/Cituao/AcademicoBundle/Form/Type/Evaluacion1Type.php
namespace Cituao\AcademicoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Evaluacion2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		        ->add('cumplido','textarea', array('label' => ' ', 'max_length' => '600' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('dl21', 'text', array('label' => 'Capacidad de gestión', 'read_only' => true))
				->add('dl22', 'text', array('label' => 'Capacidad de negociacion', 'read_only' => true))	
				->add('dl23', 'text', array('label' => 'Creatividad', 'read_only' => true))	
				->add('dl24', 'text', array('label' => 'Dominio conceptual', 'read_only' => true))	
				->add('dl25', 'text', array('label' => 'Iniciativa', 'read_only' => true))	
				->add('dl26', 'text', array('label' => 'Organización - Planeación', 'read_only' => true))	
				->add('dl27', 'text', array('label' => 'Proactividad', 'read_only' => true))	
				->add('dl28', 'text', array('label' => 'Recursividad', 'read_only' => true))	
				->add('dl29', 'text', array('label' => 'Responsabilidad', 'read_only' => true))
				->add('va31', 'text', array('label' => 'Adáptación al rol profesioanl', 'read_only' => true))	
				->add('va32', 'text', array('label' => 'Capacidad para recibir sugerencias', 'read_only' => true))	
				->add('va33', 'text', array('label' => 'Capacidad para trabajar bajo presión', 'read_only' => true))	
				->add('va34', 'text', array('label' => 'Capacidad para trabajar en equipo', 'read_only' => true))	
				->add('va35', 'text', array('label' => 'Comportamiento ético', 'read_only' => true))	
				->add('va36', 'text', array('label' => 'Compromiso', 'read_only' => true))	
				->add('va37', 'text', array('label' => 'Presentación personal', 'read_only' => true))	
				->add('va38', 'text', array('label' => 'Puntualidad', 'read_only' => true))	
				->add('va39', 'text', array('label' => 'Relaciones interpersonales', 'read_only' => true))
				->add('comentarioExterno','textarea', array('label' => ' ', 'max_length' => '500' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('aportes','textarea', array('label' => ' ', 'max_length' => '600' , 'read_only' => true, 'attr' => array
('cols' => '130', 'rows' => '10')))
				->add('proyeccion','textarea', array('label' => ' ', 'max_length' => '600' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('compromiso','textarea', array('label' => ' ', 'max_length' => '600' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('apreciacion','textarea', array('label' => ' ', 'max_length' => '600' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('aprobado', 'checkbox', array('label' => 'Aprobado', 'read_only' => true))
				->add('comentarioAcademico','textarea', array('label' => ' ', 'max_length' => '500', 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('compromisop','textarea', array('label' => ' ', 'max_length' => '500' , 'read_only' => true, 'attr' => array('cols' => '130', 'rows' => '10')));

		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\ExternoBundle\Entity\Evaluacion2', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'evaluacion2_academico';
    }
}
