<?php
// src/Cituao/PracticanteBundle/Form/Type/InformefinalType.php
namespace Cituao\PracticanteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InformefinalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		        ->add('comunicacion','textarea', array('required' => true, 'label' => ' ', 'max_length' => '5000', 'attr' => array('cols' => '130', 'rows' => '5', 'placeholder' => '¡Escribe aqui!')))
		        ->add('asesor','textarea', array('required' => true, 'label' => ' ', 'max_length' => '5000' , 'attr' => array('cols' => '130', 'rows' => '10', 'placeholder' => '¡Escribe aqui!')))
		        ->add('coordinacion','textarea', array('required' => true, 'label' => ' ', 'max_length' => '5000', 'attr' => array('cols' => '130', 'rows' => '5', 'placeholder' => '¡Escribe aqui!')))
		        ->add('universidad','textarea', array('required' => true, 'label' => ' ', 'max_length' => '5000' , 'attr' => array('cols' => '130', 'rows' => '10', 'placeholder' => '¡Escribe aqui!')))
		        ->add('autoreflexion','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5000', 'attr' => array('cols' => '130', 'rows' => '5', 'placeholder' => '¡Escribe una corta reflexión!')))
		        ->add('recomendaciones','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5000' , 'attr' => array('cols' => '130', 'rows' => '10','placeholder' => '¡Tu recomendación es valiosa y oportuna!')));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\PracticanteBundle\Entity\Informefinalpracticante', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'informefinal';
    }
}
