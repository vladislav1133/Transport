<?php
namespace App\Http\Sections;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Route;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

use App\Description;

class Routes extends Section implements Initializable
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
    protected $title = 'Маршруты';

    /**
     * @var string
     */
    protected $alias = 'routes';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-globe')->setPriority(3);
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
        return AdminDisplay::table()->setApply(function ($query) {
            $query->orderBy('created_at', 'desc');
        })->setColumns([
            AdminColumn::link('id', 'ID'),
            AdminColumn::text('distance', 'Длина'),


        ])->paginate(15);
    }

    /**
     * @param int $id ;
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {

        $form = AdminForm::panel()->addBody([
            AdminFormElement::number('distance', 'Длина')->required(),
            AdminFormElement::number('city_id', 'Город')->required(),
            AdminFormElement::multiselect('stops', 'Остановки', \App\Stop::class)->setDisplay('name'),
            //'direction' => 1,
            // 'token' => $this->randomStr('alphanum', 60)
        ]);
        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    public function onDelete($id)
    {

    }

}