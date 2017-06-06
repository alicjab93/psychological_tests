<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TestAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General', array(
                'description' => 'Wypełnij podstawowe infnormacje o teście. Następnie zdefiniuj grupy, do których zostaną przypisane pytania, a także zestaw możliwych odpowiedzi.<br><u><b>Uwaga</b></u>: Aby przejść do edycji pytań dodaj najpierw grupy i zapisz formularz. Formularz edycji pytań będzie dostępny z menu akcji po prawej stronie.</u>'
            ))
                ->add('name')
                ->add('description')
                ->add('source')
            ->end()

            ->with('Kinds')
                ->add('kinds', 'sonata_type_collection', array(
                    'by_reference' => false,
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                ))
            ->end()

            ->with('Options')
                ->add('options', 'sonata_type_collection', array(
                    'by_reference' => false,
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                ))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('description')
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array(),
                    'edit_questions' => array(
                        'template' => 'AppBundle:CRUD:list__action_edit_questions.html.twig'
                    )
                )
            ));
    }

    public function getActionButtons($action, $object = null)
    {
        $list = parent::getActionButtons($action, $object);
        if($object) {
            $list['edit_questions'] = [
                'template' => 'AppBundle:Button:edit_test_questions_button.html.twig',
            ];
        }

        ksort($list);
        return $list;
    }

}