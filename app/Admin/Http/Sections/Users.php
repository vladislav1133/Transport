<?php
namespace App\Http\Sections;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Model\ModelConfiguration as ModelConfiguration;


use App\Description;
use App\Route;
use Auth;
use Bouncer;
class Users extends Section implements Initializable
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
    protected $title = 'Пользователи';

    /**
     * @var string
     */
    protected $alias = 'users';
    /**
     * Initialize class.
     */



    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-globe');


    }


    public function isCreatable()
    {
        $user = Auth::user();
        return Bouncer::is($user)->a('super-admin');

    }

    public function isEditable(Model $model)
    {
        $user = Auth::user();
        return Bouncer::is($user)->a('super-admin');

    }

    public function isDeletable(Model $model)
    {
        $user = Auth::user();
        return Bouncer::is($user)->a('super-admin');

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
            AdminColumn::text('name', 'Имя'),
            AdminColumn::link('email', 'Почта'),

        ])->paginate(15);
    }
    /**
     * @param int $id;
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $descriptionsIds = $this->getFormattedDescriptions();

        $routes = $this->getFormattedRoutes();

        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Имя')->required(),
            AdminFormElement::text('email', 'Почта')->required(),
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
    private function randomStr($length = 8, $type = 'alphanum')
    {
        switch($type)
        {
            case 'basic'    : return mt_rand();
                break;
            case 'alpha'    :
            case 'alphanum' :
            case 'num'      :
            case 'nozero'   :
                $seedings             = array();
                $seedings['alpha']    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $seedings['alphanum'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $seedings['num']      = '0123456789';
                $seedings['nozero']   = '123456789';

                $pool = $seedings[$type];

                $str = '';
                for ($i=0; $i < $length; $i++)
                {
                    $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
                }
                return $str;
                break;
            case 'unique'   :
            case 'md5'      :
                return md5(uniqid(mt_rand()));
                break;
        }
    }


    private function getFormattedDescriptions() {
        $array = [];
        $descriptionCollection = Description::get();

        $descriptionCollection->each(function ($val) use(&$array) {
            $array[$val['id']] = $val['type'] . ' | ' . $val['price'] . ' | ' . $val['interval'] . ' | ' . $val['work_time'];
        });

        return $array;
    }

    private function getFormattedRoutes() {

        $routes = Route::with('stops')->get();

        $routes = $routes->map(function ($val) {
           $str = '';

            $val->stops->each(function ($val) use(&$str) {
                $str .= ' | ' . $val->name;
            });

            $val->stopsStr = trim($str, ' |');
            return $val;
        });


        return $routes->pluck('stopsStr', 'id')->toArray();
    }
}