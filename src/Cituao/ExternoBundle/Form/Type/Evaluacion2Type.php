<?php
// src/Cituao/ExternoBundle/Form/Type/Evaluacion1Type.php
namespace Cituao\ExternoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Evaluacion2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		        ->add('cumplido','textarea', array('label' => ' ', 'max_length' => '600' , 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('dl21', 'text', array('label' => 'Capacidad de gestión'))
				->add('dl22', 'text', array('label' => 'Capacidad de negociacion'))	
				->add('dl23', 'text', array('label' => 'Creatividad'))	
				->add('dl24', 'text', array('label' => 'Dominio conceptual'))	
				->add('dl25', 'text', array('label' => 'Iniciativa'))	
				->add('dl26', 'text', array('label' => 'Organización - Planeación'))	
				->add('dl27', 'text', array('label' => 'Proactividad'))	
				->add('dl28', 'text', array('label' => 'Recursividad'))	
				->add('dl29', 'text', array('label' => 'Responsabilidad'))
				->add('va31', 'text', array('label' => 'Adáptación al rol profesioanl'))	
				->add('va32', 'text', array('label' => 'Capacidad para recibir sugerencias'))	
				->add('va33', 'text', array('label' => 'Capacidad para trabajar bajo presión'))	
				->add('va34', 'text', array('label' => 'Capacidad para trabajar en equipo'))	
				->add('va35', 'text', array('label' => 'Comportamiento ético'))	
				->add('va36', 'text', array('label' => 'Compromiso'))	
				->add('va37', 'text', array('label' => 'Presentación personal'))	
				->add('va38', 'text', array('label' => 'Puntualidad'))	
				->add('va39', 'text', array('label' => 'Relaciones interpersonales'))
				->add('comentarioExterno','textarea', array('label' => ' ', 'max_length' => '500' , 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('aportes','textarea', array('label' => ' ', 'max_length' => '600' , 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('proyeccion','textarea', array('label' => ' ', 'max_length' => '600' , 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('compromiso','textarea', array('label' => ' ', 'max_length' => '600' , 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('apreciacion','textarea', array('label' => ' ', 'max_length' => '600' , 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('aprobado', 'checkbox', array('label' => 'Aprobado'))
				->add('comentarioAcademico','textarea', array('label' => ' ', 'read_only' => true, 'max_length' => '500', 'attr' => array('cols' => '130', 'rows' => '10')));

		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\ExternoBundle\Entity\Evaluacion2', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'evaluacion2_externo';
    }
}
