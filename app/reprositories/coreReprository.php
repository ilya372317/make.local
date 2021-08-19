<?php
namespace App\reprositories;

use Illuminate\Database\Eloquent\Model;

// Базовый класс для всех репрозиториев.
// Выполняет подключение к модели
abstract class coreReprository{

     /**
     * @var Model
     */

    // свойство хранящие в себе модель конкретного репрозитория
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    // медотд, с помощью которогу репрозитории будут подключаться к нужной им модели
    abstract protected function getModelClass();

    // Получаем досутп к данным и защищаемся от переопределения свойств.
    public function startCondition(){
        return clone $this->model;
    }
}