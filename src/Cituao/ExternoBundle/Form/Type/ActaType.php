<?php
// src/Cituao/AcademicoBundle/Form/Type/CualicuantiType.php
namespace Cituao\ExternoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
				->add('actfun', 'choice', array('required' => false, 'label' => 'Porcentaje',  'choices'=> array('25' => '25%', '50' => '50%' , '75' => '75%' , '100' => '100%')))	
				->add('actfunueva', 'choice', array('required' => false, 'label' => ' ', 'expanded' => true, 'choices'=> array('1' => '1', '2' => '2' , '2' => '2' , '3' => '3' , '4' => '4' , '5' => '5')))	
				->add('acompana', 'choice', array('required' => false, 'label' => ' ', 'expanded' => true, 'choices'=> array('1' => '1', '2' => '2' , '2' => '2' , '3' => '3' , '4' => '4' , '5' => '5')))	
				->add('trabajo', 'choice', array('required' => false, 'label' => 'Trabajo', 'expanded' => true, 'choices'=> array('1' => '1', '2' => '2' , '2' => '2' , '3' => '3' , '4' => '4' , '5' => '5')))	
				->add('aporte', 'choice', array('required' => false, 'label' => 'Aporte', 'expanded' => true, 'choices'=> array('1' => '1', '2' => '2' , '2' => '2' , '3' => '3' , '4' => '4' , '5' => '5')))	
				->add('observaciones','textarea', array('required' => false, 'label' => ' ' ,  'max_length' => '600', 'attr' => array('cols' => '80', 'rows' => '3')))
				->add('satisfaccion', 'checkbox', array('required' => false, 'label' => 'Aprobado'))
				->add('negativo','textarea', array('required' => false, 'label' => ' ' ,  'max_length' => '600', 'attr' => array('cols' => '80', 'rows' => '3')));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\ExternoBundle\Entity\Acta', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'externo_acta';
    }
}
