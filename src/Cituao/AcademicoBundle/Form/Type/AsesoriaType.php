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
		switch($this->numases){
			case 1:	
				$builder->add('docAsesor1','textarea', array('label' => 'Documentación:', 'max_length' => '1000', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '150'), 'required' => true ));
				break;
			case 2:
				$builder->add('docAsesor2','textarea', array('label' => 'Documentación:', 'max_length' => '1000', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '150'), 'required' => true ));
				break;
			case 3:
				$builder->add('docAsesor3','textarea', array('label' => 'Documentación:', 'max_length' => '1000', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '150'), 'required' => true ));
				break;
			case 4:
				$builder->add('docAsesor4','textarea', array('label' => 'Documentación:', 'max_length' => '1000', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '150'), 'required' => true ));
				break;
			case 5:
				$builder->add('docAsesor5','textarea', array('label' => 'Documentación:', 'max_length' => '1000', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '150'), 'required' => true ));
				break;
			case 6:
				$builder->add('docAsesor6','textarea', array('label' => 'Documentación:', 'max_length' => '1000', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '150'), 'required' => true ));
				break;
			case 7:
				$builder->add('docAsesor7','textarea', array('label' => 'Documentación:', 'max_length' => '1000', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '150'), 'required' => true ));
				break;
		}		
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
