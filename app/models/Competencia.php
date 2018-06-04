<?php

namespace syl\ean;

class Competencia extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_competencia", type="integer", length=11, nullable=false)
     */
    protected $id_competencia;

    /**
     *
     * @var string
     * @Column(column="tipo", type="string", length=1, nullable=false)
     */
    protected $tipo;

    /**
     *
     * @var string
     * @Column(column="clave", type="string", length=2, nullable=false)
     */
    protected $clave;

    /**
     *
     * @var string
     * @Column(column="descripcion", type="string", length=100, nullable=true)
     */
    protected $descripcion;

    /**
     *
     * @var string
     * @Column(column="contenido", type="string", length=100, nullable=true)
     */
    protected $contenido;

    /**
     * Method to set the value of field id_competencia
     *
     * @param integer $id_competencia
     * @return $this
     */
    public function setIdCompetencia($id_competencia)
    {
        $this->id_competencia = $id_competencia;

        return $this;
    }

    /**
     * Method to set the value of field tipo
     *
     * @param string $tipo
     * @return $this
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Method to set the value of field clave
     *
     * @param string $clave
     * @return $this
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Method to set the value of field descripcion
     *
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Method to set the value of field contenido
     *
     * @param string $contenido
     * @return $this
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Returns the value of field id_competencia
     *
     * @return integer
     */
    public function getIdCompetencia()
    {
        return $this->id_competencia;
    }

    /**
     * Returns the value of field tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Returns the value of field clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Returns the value of field descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Returns the value of field contenido
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("competencia");
        $this->hasMany('id_competencia', 'syl\ean\SesionComp', 'id_competencia', ['alias' => 'SesionComp']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'competencia';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Competencia[]|Competencia|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Competencia|\Phalcon\Mvc\Model\ResultInterface
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
            'id_competencia' => 'id_competencia',
            'tipo' => 'tipo',
            'clave' => 'clave',
            'descripcion' => 'descripcion',
            'contenido' => 'contenido'
        ];
    }

}
