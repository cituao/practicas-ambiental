<?php
// src/Cituao/CoordBundle/Form/Type/CoordinadorType.php
namespace Cituao\CoordBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoordinadorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('username','text', array('label' => 'CI coordinador', 'max_length' => '25'))	    
        ->add('password', 'repeated', array(
           'first_name'  => 'password',
           'second_name' => 'confirm',
           'type'        => 'password',
        ));


		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\UsuarioBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'usuariocoordinador';
    }
}
