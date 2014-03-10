<?php
// src/Cituao/AcademicoBundle/Form/Type/AsesoriaType.php
namespace Cituao\AcademicoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AsesoriaType extends AbstractType
{
	private $numase;
	
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('practicante','integer', array('label' => 'Practicante:','read_only' => true))	    
		->add('academico','integer', array('label' => 'Academico:', 'read_only' => true))
        ->add('docAsesor1','text', array('label' => 'Documentación:', 'read_only' => true))
        ->add('docPracticante1', 'text',  array('label' => 'Documentacion',  'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!'), 'required' => true ));
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\CoordBundle\Entity\Asesoria', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'asesoria';
    }
	
	public function setNumeroAsesoria($numase){
		$this->numase = $numase;
	}
}
