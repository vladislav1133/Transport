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


class Descriptions extends Section implements Initializable
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
    protected $title = 'Описание транспорта';

    /**
     * @var string
     */
    protected $alias = 'descriptions';
    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-globe')->setPriority(6);
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
            AdminColumn::link('id', 'ID'),
            AdminColumn::text('type', 'Тип'),
            AdminColumn::text('price', 'Цена'),
            AdminColumn::text('interval', 'Интерва'),
            AdminColumn::text('work_time', 'Время работы'),

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
            AdminFormElement::text('price', 'Цена')->required(),
            AdminFormElement::select('type', 'Тип транспорта', $TypeOptions = ['bus' => 'bus'])->required(),
            AdminFormElement::text('interval', 'Интервал')->required(),
            AdminFormElement::text('work_time', 'Время работы')->required(),
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