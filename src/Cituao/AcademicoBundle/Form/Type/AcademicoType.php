<?php
// src/Cituao/AcademicoBundle/Form/Type/AcademicoType.php
namespace Cituao\AcademicoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AcademicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('ci','text', array('label' => 'Cédula de identidad:','read_only' => true))	    
		->add('nombres','text', array('label' => 'Nombres:', 'read_only' => true))
        ->add('apellidos','text', array('label' => 'Apellidos:', 'read_only' => true))
		->add('emailInstitucional', 'email',  array('label' => 'Email institucional:',  'attr' => array('placeholder' => 'usuario@servidor') ))
        ->add('email', 'email',  array('label' => 'Email personal:',  'attr' => array('placeholder' => 'usuario@servidor') ))
		->add('telefonoMovil','text', array('label' => 'Teléfono móvil:', 'required' => true))
		->add('telefonoFijo','text', array('label' => 'Teléfono fijo:'))
		->add('perfil','textarea', array('label' => 'Perfil', 'max_length' => '500' , 'read_only' => true, 'attr' => array('cols' => '60', 'rows' => '10')));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\AcademicoBundle\Entity\Academico', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'academico';
    }
}
