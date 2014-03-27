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

		switch($this->numase){
			case 1:	
				$builder->add('docAsesor1','textarea', array('label' => 'Tu reflexión del proceso:',  'max_length' => '500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				$builder->add('docPracticante1','textarea', array('label' => 'Tu practicante indica:' , 'read_only' => true,  'max_length' => '5500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				break;
			case 2:
				$builder->add('docAsesor2','textarea', array('label' => 'Tu reflexión del proceso:', 'max_length' => '500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				$builder->add('docPracticante2','textarea', array('label' => 'Tu practicante indica:' , 'read_only' => true, 'max_length' => '5500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				break;
			case 3:
				$builder->add('docAsesor3','textarea', array('label' => 'Tu reflexión del proceso:', 'max_length' => '500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => true ));
				$builder->add('docPracticante3','textarea', array('label' => 'Tu practicante indica:', 'read_only' => true,'max_length' => '5500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				break;
			case 4:
				$builder->add('docAsesor4','textarea', array('label' => 'Tu reflexión del proceso:', 'max_length' => '500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				$builder->add('docPracticante4','textarea', array('label' => 'Tu practicante indica:', 'read_only' => true, 'max_length' => '5500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				break;
			case 5:
				$builder->add('docAsesor5','textarea', array('label' => 'Tu reflexión del proceso:', 'max_length' => '500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				$builder->add('docPracticante5','textarea', array('label' => 'Tu practicante indica:', 'read_only' => true, 'max_length' => '5500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				break;
			case 6:
				$builder->add('docAsesor6','textarea', array('label' => 'Tu reflexión del proceso:', 'max_length' => '500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				$builder->add('docPracticante6','textarea', array('label' => 'Tu practicante indica:', 'read_only' => true,'max_length' => '5500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				break;
			case 7:
				$builder->add('docAsesor7','textarea', array('label' => 'Tu reflexión del proceso:', 'max_length' => '500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
				$builder->add('docPracticante7','textarea', array('label' => 'Tu practicante indica:', 'read_only' => true,'max_length' => '5500', 'attr' => array('placeholder' => 'Escriba sus comentarios sobre el proceso!' , 'cols' => '125', 'rows' => '10'), 'required' => false ));
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
