<?php
// src/Cituao/ExternoBundle/Form/Type/HojadevidaType.php
namespace Cituao\CoordBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ExternoType extends AbstractType
{
	protected $programa;

	public function __construct($programa){
		$this->programa = $programa;
	}

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$prg = $this->programa;	

        $builder
		->add('ci','text', array('label' => 'Cédula de identidad:' , 'required' => true))	    
		->add('nombres','text', array('label' => 'Nombres:' , 'required' => true))
        ->add('apellidos','text', array('label' => 'Apellidos:' , 'required' => true))
        ->add('email', 'email',  array('required' => false, 'label' => 'Email:'))
		->add('telefonoMovil','text', array('required' => false, 'label' => 'Teléfono móvil:'))
		->add('telefonoFijo','text', array('required' => false, 'label' => 'Teléfono fijo:'))
		->add('centros','entity', array('label' => 'Centro de prácticas',
										 'class' => 'CituaoCoordBundle:Centro',
										 'query_builder' => function(EntityRepository $er) use ($prg){
      																return $er->createQueryBuilder('c')
																		->where('c.programa = :id_programa')
																		->orderBy('c.nombre', 'ASC')
                														->setParameter('id_programa',$prg);},  
										 'property'=>'nombre', 
										 'empty_value' => 'Seleccione?',
										 'mapped' => false))
		->add('cargo','text', array('required' => false, 'label' => 'Cargo:'));
		
		}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cituao\ExternoBundle\Entity\Externo', 'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'externo';
    }
}
