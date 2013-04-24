<?php


/**
 * Method parameter metadata
 *
 *
 */
class Rest_Method_Parameter
{
    /**
     * @var mixed Default parameter value
     */
    protected $_defaultValue;

    /**
     * @var string Parameter description
     */
    protected $_description = '';

    /**
     * @var string Parameter variable name
     */
    protected $_name;

    /**
     * @var bool Is parameter optional?
     */
    protected $_optional = false;

    /**
     * @var string Parameter type
     */
    protected $_type = 'mixed';

    /**
     * Constructor
     *
     * @param  null|array $options
     * @return void
     */
    public function __construct($options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * Set object state from array of options
     *
     * @param  array $options
     * @return Rest_Method_Parameter
     */
    public function setOptions(array $options)
    {
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * Set default value
     *
     * @param  mixed $defaultValue
     * @return Rest_Method_Parameter
     */
    public function setDefaultValue($defaultValue)
    {
        $this->_defaultValue = $defaultValue;
        return $this;
    }

    /**
     * Retrieve default value
     *
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->_defaultValue;
    }

    /**
     * Set description
     *
     * @param  string $description
     * @return Rest_Method_Parameter
     */
    public function setDescription($description)
    {
        $this->_description = (string) $description;
        return $this;
    }

    /**
     * Retrieve description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Set name
     *
     * @param  string $name
     * @return Rest_Method_Parameter
     */
    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

    /**
     * Retrieve name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set optional flag
     *
     * @param  bool $flag
     * @return Rest_Method_Parameter
     */
    public function setOptional($flag)
    {
        $this->_optional = (bool) $flag;
        return $this;
    }

    /**
     * Is the parameter optional?
     *
     * @return bool
     */
    public function isOptional()
    {
        return $this->_optional;
    }

    /**
     * Set parameter type
     *
     * @param  string $type
     * @return Rest_Method_Parameter
     */
    public function setType($type)
    {
        $this->_type = (string) $type;
        return $this;
    }

    /**
     * Retrieve parameter type
     *
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * Cast to array
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'type'         => $this->getType(),
            'name'         => $this->getName(),
            'optional'     => $this->isOptional(),
            'defaultValue' => $this->getDefaultValue(),
            'description'  => $this->getDescription(),
        );
    }
}