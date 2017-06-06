<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class TestQuestionAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_app_test_question';
    protected $baseRoutePattern = 'app/test_question';

    protected function configureFormFields(FormMapper $formMapper)
    {

        if($this->hasSubject() && count($this->getSubject()->getKinds())) {
            $formMapper
                ->add('questions', 'sonata_type_collection', array(
                    'by_reference' => false,
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                ));
        }
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(array('edit'));
    }

    public function getActionButtons($action, $object = null)
    {
        $list = parent::getActionButtons($action, $object);

        $list['edit_questions'] = [
            'template' => 'AppBundle:Button:edit_test_button.html.twig',
        ];

        return $list;
    }
}