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
		        ->add('proceso','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500' , 'attr' => array('cols' => '130', 'rows' => '15')))
				->add('herramientas','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500' , 'attr' => array('cols' => '130', 'rows' => '15')))
				->add('dl21', 'choice', array('required' => false, 'label' => 'Capacidad de gestión' , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))
				->add('dl22', 'choice', array('required' => false, 'label' => 'Capacidad de negociacion'   , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl23', 'choice', array('required' => false, 'label' => 'Creatividad'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl24', 'choice', array('required' => false, 'label' => 'Dominio conceptual'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl25', 'choice', array('required' => false, 'label' => 'Iniciativa'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl26', 'choice', array('required' => false, 'label' => 'Organización - Planeación' , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl27', 'choice', array('required' => false, 'label' => 'Proactividad'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('dl28', 'choice', array('required' => false, 'label' => 'Recursividad' , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO') ))	
				->add('dl29', 'choice', array('required' => false, 'label' => 'Responsabilidad'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))
				->add('va31', 'choice', array('required' => false, 'label' => 'Adáptación al rol profesioanl'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va32', 'choice', array('required' => false, 'label' => 'Capacidad para recibir sugerencias'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va33', 'choice', array('required' => false, 'label' => 'Capacidad para trabajar bajo presión'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va34', 'choice', array('required' => false, 'label' => 'Capacidad para trabajar en equipo'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va35', 'choice', array('required' => false, 'label' => 'Comportamiento ético'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va36', 'choice', array('required' => false, 'label' => 'Compromiso'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va37', 'choice', array('required' => false, 'label' => 'Presentación personal'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va38', 'choice', array('required' => false, 'label' => 'Puntualidad'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))	
				->add('va39', 'choice', array('required' => false, 'label' => 'Relaciones interpersonales'  , 'choices'=> array('DEFICIENTE' => 'DEFICIENTE', 'SATISFACTORIO' => 'SATISFACTORIO' , 'BUENO' => 'BUENO')))
				->add('comentarioExterno','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500' , 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('aprobado', 'checkbox', array('required' => false, 'label' => 'Aprobado'))
				->add('comentarioAcademico','textarea', array('required' => false, 'label' => ' ' , 'read_only' => true, 'max_length' => '5500', 'attr' => array('cols' => '130', 'rows' => '10')))
				->add('compromiso','textarea', array('required' => false, 'label' => ' ' , 'read_only' => true, 'max_length' => '5500', 'attr' => array('cols' => '130', 'rows' => '10')));

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
