<?php

namespace syl\ean;

class Sesion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_sesion", type="integer", length=11, nullable=false)
     */
    protected $id_sesion;

    /**
     *
     * @var string
     * @Column(column="contenidos", type="string", length=250, nullable=true)
     */
    protected $contenidos;

    /**
     *
     * @var string
     * @Column(column="act_aprendizaje", type="string", length=250, nullable=true)
     */
    protected $act_aprendizaje;

    /**
     *
     * @var integer
     * @Column(column="numero", type="integer", length=11, nullable=false)
     */
    protected $numero;

    /**
     * Method to set the value of field id_sesion
     *
     * @param integer $id_sesion
     * @return $this
     */
    public function setIdSesion($id_sesion)
    {
        $this->id_sesion = $id_sesion;

        return $this;
    }

    /**
     * Method to set the value of field contenidos
     *
     * @param string $contenidos
     * @return $this
     */
    public function setContenidos($contenidos)
    {
        $this->contenidos = $contenidos;

        return $this;
    }

    /**
     * Method to set the value of field act_aprendizaje
     *
     * @param string $act_aprendizaje
     * @return $this
     */
    public function setActAprendizaje($act_aprendizaje)
    {
        $this->act_aprendizaje = $act_aprendizaje;

        return $this;
    }

    /**
     * Method to set the value of field numero
     *
     * @param integer $numero
     * @return $this
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Returns the value of field id_sesion
     *
     * @return integer
     */
    public function getIdSesion()
    {
        return $this->id_sesion;
    }

    /**
     * Returns the value of field contenidos
     *
     * @return string
     */
    public function getContenidos()
    {
        return $this->contenidos;
    }

    /**
     * Returns the value of field act_aprendizaje
     *
     * @return string
     */
    public function getActAprendizaje()
    {
        return $this->act_aprendizaje;
    }

    /**
     * Returns the value of field numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("sesion");
        $this->hasMany('id_sesion', 'syl\ean\DetalleSesion', 'id_sesion', ['alias' => 'DetalleSesion']);
        $this->hasMany('id_sesion', 'syl\ean\SesionComp', 'id_sesion', ['alias' => 'SesionComp']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sesion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sesion[]|Sesion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sesion|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id_sesion' => 'id_sesion',
            'contenidos' => 'contenidos',
            'act_aprendizaje' => 'act_aprendizaje',
            'numero' => 'numero'
        ];
    }

}
