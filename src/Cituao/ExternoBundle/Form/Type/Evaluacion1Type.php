<?php
// src/Cituao/ExternoBundle/Form/Type/Evaluacion1Type.php
namespace Cituao\ExternoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Evaluacion1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		        ->add('proceso','textarea', array('label' => ' ', 'max_length' => '600' , 'attr' => array('cols' => '130', 'rows' => '15')))
				->add('herramientas','textarea', array('label' => ' ', 'max_length' => '600' , 'attr' => array('cols' => '130', 'rows' => '15')))
				->add('dl21', 'choice', array('label' => 'Capacidad de gestión' , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))
				->add('dl22', 'choice', array('label' => 'Capacidad de negociacion'   , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl23', 'choice', array('label' => 'Creatividad'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl24', 'choice', array('label' => 'Dominio conceptual'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl25', 'choice', array('label' => 'Iniciativa'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl26', 'choice', array('label' => 'Organización - Planeación' , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl27', 'choice', array('label' => 'Proactividad'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl28', 'choice', array('label' => 'Recursividad' , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO') ))	
				->add('dl29', 'choice', array('label' => 'Responsabilidad'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))
				->add('va31', 'choice', array('label' => 'Adáptación al rol profesioanl'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va32', 'choice', array('label' => 'Capacidad para recibir sugerencias'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va33', 'choice', array('label' => 'Capacidad para trabajar bajo presión'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va34', 'choice', array('label' => 'Capacidad para trabajar en equipo'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va35', 'choice', array('label' => 'Comportamiento ético'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va36', 'choice', array('label' => 'Compromiso'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va37', 'choice', array('label' => 'Presentación personal'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va38', 'choice', array('label' => 'Puntualidad'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va39', 'choice', array('label' => 'Relaciones interpersonales'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))
				->add('comentarioExterno','textarea', array('label' => ' ', 'max_length' => '500' , 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('aprobado', 'checkbox', array('label' => 'Aprobado'))
				->add('comentarioAcademico','textarea', array('label' => ' ' , 'read_only' => true, 'max_length' => '500', 'attr' => array('cols' => '130', 'rows' => '10')));

		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\ExternoBundle\Entity\Evaluacion1', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'evaluacion1_externo';
    }
}