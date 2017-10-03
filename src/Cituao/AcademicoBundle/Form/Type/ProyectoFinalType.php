<?php
// src/Cituao/PracticanteBundle/Form/Type/Evaluacion1Type.php
namespace Cituao\AcademicoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProyectoFinalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('listoProyecto', 'checkbox', array('required' => false, 'label' => 'Entregado', 'attr'=>array('oninvalid'=>"setCustomValidity('¡Debe confirmar! o Regresar')")));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\AcademicoBundle\Entity\Cronograma', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'proyectofinal_entrega';
    }
}
