<?php
// src/Cituao/CoordBundle/Form/Type/CronogramaType.php
namespace Cituao\CoordBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CronogramaType extends AbstractType
{
	protected $programa;
	protected $practicante;

	public function __construct($programa, $practicante){
		$this->programa = $programa;
		$this->practicante = $practicante;

	}

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$prg = $this->programa;
		$practicante = $this->practicante;
		$centro = $practicante->getCentro();
		
        $builder
	    ->add('apellidos','text', array('label' => 'Apellidos', 'read_only'=>'true'))
		->add('nombres','text', array('label' => 'Nombres','read_only'=>'true'))
		->add('centro','entity', array('label' => 'Centro de prácticas', 'class' => 'CituaoCoordBundle:Centro' ,
										'query_builder' => function(EntityRepository $er) use ($prg){
      									return $er->createQueryBuilder('c')
										->where('c.programa = :id_programa')   
										->orderBy('c.nombre', 'ASC')
										->setParameter('id_programa', $prg);										
      										},
 'property'=>'nombre', 'empty_value' => 'Seleccione?'))
	
		
		->add('academico','entity', array('label' => 'Asesor académico', 'class' => 'CituaoAcademicoBundle:Academico', 'choices' => $prg->getAcademicos(), 'empty_value' => '¿Seleccione?'))
		
		->add('fechaIniciacion', 'date', array('label' => 'Fecha de iniciación','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))				
		->add('fechaAsesoria1', 'date', array('label' => 'Asesoría #1','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria2', 'date', array('label' => 'Asesoría #2','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria3', 'date', array('label' => 'Asesoría #3','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria4', 'date', array('label' => 'Asesoría #4','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria5', 'date', array('label' => 'Asesoría #5','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria6', 'date', array('label' => 'Asesoría #6','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaAsesoria7', 'date', array('label' => 'Asesoría #7','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		
		->add('fechaVisitaP', 'date', array('label' => 'Primera visita', 'widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaVisita1', 'date', array('label' => 'Evaluación #1','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaVisita2', 'date', array('label' => 'Evaluación #2','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		
		->add('fechaInformeGestion1', 'date', array('label' => 'Informe de Gestión #1', 'widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaInformeGestion2', 'date', array('label' => 'Informe de Gestión #2','widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		->add('fechaInformeGestion3', 'date', array('label' => 'Informe de Gestión #3', 'widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'))
		
		->add('fechaInformeFinal', 'date', array('label' => 'Informe Final', 'widget' => 'single_text',  'format' => 'dd-MM-yyyy', 'read_only' => 'true'));
		
		if ($practicante->getEstado() == 1) 
			$builder->add('externo','entity', array('label' => 'Asesor externo', 'class' => 'CituaoExternoBundle:Externo', 'choices' => $centro->getExternos(), 'empty_value' => '¿Seleccione?'));
		else
			$builder->add('externo','entity', array('label' => 'Asesor externo', 'class' => 'CituaoExternoBundle:Externo', 'empty_value' => '¿Seleccione?'));
		
		
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
