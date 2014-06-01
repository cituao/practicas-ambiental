<?php
// src/Cituao/CoordBundle/Form/Type/PracticanteType.php
namespace Cituao\UsuarioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProgramaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('nombre','text', array('label' => 'Nombre'))	    
		->add('coordinador','text', array('label' => 'Coordinador'))
		->add('password','password', array('label' => 'Contraseña',   'mapped' => false))
		->add('passwordr','password', array('label' => 'Repetir contraseña',   'mapped' => false))
        ->add('email', 'email',  array('required' => false, 'label' => 'Email coordinador'));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\UsuarioBundle\Entity\Programa', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'programa';
    }
}
