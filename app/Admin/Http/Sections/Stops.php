<?php
namespace App\Http\Sections;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;


class Stops extends Section implements Initializable
{
    /**
     * Class Posts
     *
     * @property \App\Model $model
     *
     * @see http://sleepingowladmin.ru/docs/model_configuration_section
     */
    protected $checkAccess = false;
    /**
     * @var string
     */
    protected $title = 'Остановки';

    /**
     * @var string
     */
    protected $alias = 'stops';
    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-globe')->setPriority(4);
    }
    public function scopeLast($query)
    {
        $query->orderBy('id', 'asc');
    }
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()->setApply(function($query) {
            $query->orderBy('created_at', 'desc');
        })->setColumns([
            AdminColumn::text('id', 'ID'),
            AdminColumn::link('name', 'Название остановки'),
            AdminColumn::text('lon', 'Долгота'),
            AdminColumn::text('lat', 'Широта'),

        ])->paginate(15);
    }
    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название остановки')->required(),
            AdminFormElement::number('lon', 'Долгота')->required(),
            AdminFormElement::number('lat', 'Широта')->required(),
        ]);
        return $form;
    }
    /**
     * @return FormInterface
     */
    public function onCreate(){
        return $this->onEdit(null);
    }

    public function onDelete($id){

    }
}