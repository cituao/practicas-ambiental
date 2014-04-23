<?php
// src/Cituao/AcademicoBundle/Form/Type/AcademicoType.php
namespace Cituao\CoordBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AcademicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('file')
		->add('ci','text', array('label' => 'Cédula de identidad:','required' => true))	    
		->add('nombres','text', array('label' => 'Nombres:', 'required' => true))
        ->add('apellidos','text', array('label' => 'Apellidos:', 'required' => true))
 		->add('emailInstitucional', 'email',  array('required' => false, 'label' => 'Email institucional:'))
        ->add('email', 'email',  array('required' => false, 'label' => 'Email personal:'))
		->add('telefonoMovil','text', array('required' => false, 'label' => 'Teléfono móvil:'))
		->add('telefonoFijo','text', array('required' => false, 'label' => 'Teléfono fijo:'))
		->add('perfil','textarea', array('required' => false, 'label' => 'Perfil', 'max_length' => '5500' ,  'attr' => array('cols' => '80', 'rows' => '5')))
		->add('categoria', 'choice', array('required' => false, 'label' => 'Categoría', 'choices'=> array('a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D')))	
		->add('declaracion', 'checkbox', array('required' => false, 'label' => 'Declaración de Renta', 'required' => false));
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
