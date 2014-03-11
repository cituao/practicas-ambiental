<?php
// src/Cituao/AcademicoBundle/Form/Type/EvaluacionType.php
namespace Cituao\AcademicoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvaluacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('proceso','textarea', array('label' => 'Proceso', 'max_length' => '1000' , 'read_only' => true, 'attr' => array('cols' => '45', 'rows' => '25')))
		->add('herramientas','textarea', array('label' => 'Herramientas', 'max_length' => '1000' , 'read_only' => true, 'attr' => array('cols' => '45', 'rows' => '25')))
		->add('proceso','textarea', array('label' => 'Proceso', 'max_length' => '1000' , 'read_only' => true, 'attr' => array('cols' => '45', 'rows' => '25')))
		->add('dl21', 'choice', array('label' => 'Capacidad de gestión', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl22', 'choice', array('label' => 'Capacidad de negociacion', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl23', 'choice', array('label' => 'Creatividad', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl24', 'choice', array('label' => 'Dominio conceptual', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl25', 'choice', array('label' => 'Iniciativa', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl26', 'choice', array('label' => 'Organización - Planeación', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl27', 'choice', array('label' => 'Proactividad', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl28', 'choice', array('label' => 'Recursividad', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl29', 'choice', array('label' => 'Responsabilidad', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	

		->add('dl31', 'choice', array('label' => 'Adáptación al rol profesioanl', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl32', 'choice', array('label' => 'Capacidad para recibir sugenrencias', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl33', 'choice', array('label' => 'Capacidad para trabajar bajo presión', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl34', 'choice', array('label' => 'Capacidad para trabajar em equipos', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl35', 'choice', array('label' => 'Comportamiento ético', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl36', 'choice', array('label' => '', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl37', 'choice', array('label' => 'Proactividad', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl38', 'choice', array('label' => 'Recursividad', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	
		->add('dl39', 'choice', array('label' => 'Responsabilidad', 'choices'=> array('a' => 'Deficiente', 'b' => 'Satisfactorio', 'c' => 'Bueno', 'd' => 'Excelente')))	



		->add('proceso','text', array('label' => 'Proceso:','read_only' => true))	    
		->add('nombres','text', array('label' => 'Nombres:', 'read_only' => true))
        ->add('apellidos','text', array('label' => 'Apellidos:', 'read_only' => true))
        ->add('email', 'email',  array('label' => 'Email:',  'attr' => array('placeholder' => 'usuario@servidor'), 'required' => true ))
		->add('telefonoMovil','text', array('label' => 'Teléfono móvil:', 'required' => true))
		->add('telefonoFijo','text', array('label' => 'Teléfono fijo:'))
		->add('perfil','textarea', array('label' => 'Perfil', 'max_length' => '500' , 'read_only' => true, 'attr' => array('cols' => '5', 'rows' => '5')));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\AcademicoBundle\Entity\Academico', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'evaluacion';
    }
}
