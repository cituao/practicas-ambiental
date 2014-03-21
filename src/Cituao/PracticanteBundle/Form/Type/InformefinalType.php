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
		        ->add('comunicacion','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5000', 'attr' => array('cols' => '130', 'rows' => '5')))
		        ->add('asesor','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5000' , 'attr' => array('cols' => '130', 'rows' => '10')))
		        ->add('coordinacion','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5000', 'attr' => array('cols' => '130', 'rows' => '5')))
		        ->add('universidad','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5000' , 'attr' => array('cols' => '130', 'rows' => '10')))
		        ->add('autoreflexion','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5000', 'attr' => array('cols' => '130', 'rows' => '5')))
		        ->add('recomendaciones','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5000' , 'attr' => array('cols' => '130', 'rows' => '10')));
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
