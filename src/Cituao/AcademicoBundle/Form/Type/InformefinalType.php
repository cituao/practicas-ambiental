<?php
// src/Cituao/AcademicoBundle/Form/Type/InformefinalType.php
namespace Cituao\AcademicoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InformefinalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		        ->add('metodologia','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500', 'attr' => array('cols' => '130', 'rows' => '5')))
		        ->add('competencia','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500' , 'attr' => array('cols' => '130', 'rows' => '10')))
		        ->add('recomendaciones','textarea', array('required' => false, 'label' => ' ', 'max_length' => '5500', 'attr' => array('cols' => '130', 'rows' => '5')));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\AcademicoBundle\Entity\Informefinalacademico', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'informefinalaca';
    }
}
