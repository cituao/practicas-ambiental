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
		->add('ci','text', array('label' => 'Cédula de identidad:','required' => true))	    
		->add('nombres','text', array('label' => 'Nombres:', 'required' => true))
        ->add('apellidos','text', array('label' => 'Apellidos:', 'required' => true))
        ->add('email', 'email',  array('label' => 'Email:',  'attr' => array('placeholder' => 'usuario@servidor'), 'required' => true ))
		->add('telefonoMovil','text', array('label' => 'Teléfono móvil:', 'required' => true))
		->add('telefonoFijo','text', array('label' => 'Teléfono fijo:'));
		

		//->add('modalidad','choice', array('label' => 'Modalidad', 'choices'=> array('aud'=>'Audio', 'vis'=>'Visual', 'imp'=>'Impreso'),'multiple'=>true));*/
		//->add('tipo','choice', array('label' => 'Tipo', 'choices'=> array('nac'=>'Nacional', 'int'=>'Internacional')))

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
