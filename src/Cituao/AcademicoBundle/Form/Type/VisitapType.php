<?php
// src/Cituao/AcademicoBundle/Form/Type/Evaluacion1Type.php
namespace Cituao\AcademicoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VisitapType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		        ->add('comentario','textarea', array('label' => 'Comentarios de la actividad:', 'max_length' => '600' ,  'attr' => array('cols' => '130', 'rows' => '10')));

		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\AcademicoBundle\Entity\Cronograma', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'visitap_academico';
    }
}
