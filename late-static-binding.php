<?php
abstract class AbstractClass
{
    const CONSTANT = 'AbstractClass constant';

    protected static $var = 'AbstractClass var';

    function getVar()
    {
        return self::$var;
    }

    function getStaticVar()
    {
        return static::$var;
    }

    protected static function method()
    {
        return 'AbstractClass method';
    }

    function callMethod()
    {
        return self::method();
    }

    function callStaticMethod()
    {
        return static::method();
    }

    function getConstant()
    {
        return self::CONSTANT;
    }

    function getStaticConstant()
    {
        return static::CONSTANT;
    }
}

class ConcreteClass extends AbstractClass
{
    const CONSTANT = 'ConcreteClass constant';

    protected static $var = 'ConcreteClass var';

    function getParentVar()
    {
        return parent::$var;
    }

    protected static function method()
    {
        return 'ConcreteClass method';
    }

    function callParentMethod()
    {
        return parent::method();
    }

    function getParentConstant()
    {
        return parent::CONSTANT;
    }
}

$object = new ConcreteClass();

echo '<pre>';
echo sprintf('%17s => %s', 'getVar', $object->getVar()) . PHP_EOL;
echo sprintf('%17s => %s', 'getStaticVar', $object->getStaticVar()) . PHP_EOL;
echo sprintf('%17s => %s', 'getParentVar', $object->getParentVar()) . str_repeat(PHP_EOL, 2);
echo sprintf('%17s => %s', 'callMethod', $object->callMethod()) . PHP_EOL;
echo sprintf('%17s => %s', 'callStaticMethod', $object->callStaticMethod()) . PHP_EOL;
echo sprintf('%17s => %s', 'callParentMethod', $object->callParentMethod()) . str_repeat(PHP_EOL, 2);
echo sprintf('%17s => %s', 'getConstant', $object->getConstant()) . PHP_EOL;
echo sprintf('%17s => %s', 'getStaticConstant', $object->getStaticConstant()) . PHP_EOL;
echo sprintf('%17s => %s', 'getParentConstant', $object->getParentConstant()) . PHP_EOL;
echo '</pre>';
