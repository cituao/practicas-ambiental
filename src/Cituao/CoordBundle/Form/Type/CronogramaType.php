<?php
// src/Cituao/CoordBundle/Form/Type/CronogramaType.php
namespace Cituao\CoordBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CronogramaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	    ->add('apellidos','text', array('label' => 'Apellidos', 'read_only'=>'true'))
		->add('nombres','text', array('label' => 'Nombres','read_only'=>'true'))
		->add('centro','entity', array('label' => 'Centro de prácticas', 'class' => 'CituaoCoordBundle:Centro' , 'property'=>'nombre', 'empty_value' => 'Seleccione un centro de prácticas'))
		->add('externo','entity', array('label' => 'Asesor externo','class' => 'CituaoExternoBundle:Externo' , 'property'=>'NombreCompleto', 'empty_value' => 'Seleccione un asesor externo'))
		->add('academico','entity', array('label' => 'Asesor académico','class' => 'CituaoAcademicoBundle:Academico' , 'property'=>'NombreCompleto', 'empty_value' => 'Seleccione un asesor académico'))
		
		->add('fechaIniciacion', 'date', array('label' => 'Fecha de iniciación','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))				
		
		->add('fechaAsesoria1', 'date', array('label' => 'Fecha de asesoría #1','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria2', 'date', array('label' => 'Fecha de asesoría #2','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria3', 'date', array('label' => 'Fecha de asesoría #3','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria4', 'date', array('label' => 'Fecha de asesoría #4','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria5', 'date', array('label' => 'Fecha de asesoría #5','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria6', 'date', array('label' => 'Fecha de asesoría #6','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria7', 'date', array('label' => 'Fecha de asesoría #7','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		
		->add('fechaVisitaP', 'date', array('label' => 'Fecha de primera visita', 'widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaVisita1', 'date', array('label' => 'Fecha de visita #2','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaVisita2', 'date', array('label' => 'Fecha de asesoría #3','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		
		->add('fechaInformeGestion1', 'date', array('widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaInformeGestion2', 'date', array('widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaInformeGestion3', 'date', array('widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		
		->add('fechaInformeFinal', 'date', array('widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'));
		
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\CoordBundle\Entity\Practicante'
        ));
    }

    public function getName()
    {
        return 'cronograma';
    }
}
