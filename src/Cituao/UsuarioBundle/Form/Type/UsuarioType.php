<?php
// src/Cituao/UsuarioBundle/Form/Type/UserType.php
namespace Cituao\UsuarioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	->add('username','text', array('label' => 'Nombre de usuario'))
        ->add('password', 'repeated', array(
            'type' => 'password',
            'invalid_message' => 'Las dos contraseñas deben coincidir',
            'first_options'   => array('label' => 'Contraseña'),
            'second_options'  => array('label' => 'Repite Contraseña'),
            'required'        => false
        ))

        ->add('email', 'email',  array('label' => 'Correo electrónico', 'attr' => array(
            'placeholder' => 'usuario@servidor'
        )));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\UsuarioBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'usuario';
    }
}
