<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class QuestionAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $parent = $this->getParentFieldDescription()->getAdmin()->getSubject();
//var_Dump($parent->getKinds());
//        foreach($parent->getKinds() as $kind) {
//            var_dump($kind);
//        }
        $formMapper
            ->add('text')
            ->add('kind', 'entity', array(
                'class' => 'AppBundle\Entity\Kind',
                'choices' => $parent ? $parent->getKinds() : array(),
                'choice_label' => 'name',
                'mapped' => true,
//                'by_reference' => false,
        ))
            ->add('isReverse')
            ->add('position');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('text');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('text');
    }
    
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(array('create'));
    }
}