<?php

namespace syl\ean;

class Materia extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_materia", type="integer", length=11, nullable=false)
     */
    protected $id_materia;

    /**
     *
     * @var string
     * @Column(column="codigo", type="string", length=15, nullable=true)
     */
    protected $codigo;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", length=20, nullable=false)
     */
    protected $nombre;

    /**
     *
     * @var string
     * @Column(column="descripcion", type="string", length=250, nullable=true)
     */
    protected $descripcion;

    /**
     *
     * @var string
     * @Column(column="tipo", type="string", length=20, nullable=false)
     */
    protected $tipo;

    /**
     *
     * @var integer
     * @Column(column="creditos", type="integer", length=11, nullable=false)
     */
    protected $creditos;

    /**
     * Method to set the value of field id_materia
     *
     * @param integer $id_materia
     * @return $this
     */
    public function setIdMateria($id_materia)
    {
        $this->id_materia = $id_materia;

        return $this;
    }

    /**
     * Method to set the value of field codigo
     *
     * @param string $codigo
     * @return $this
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Method to set the value of field nombre
     *
     * @param string $nombre
     * @return $this
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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
     * Method to set the value of field creditos
     *
     * @param integer $creditos
     * @return $this
     */
    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;

        return $this;
    }

    /**
     * Returns the value of field id_materia
     *
     * @return integer
     */
    public function getIdMateria()
    {
        return $this->id_materia;
    }

    /**
     * Returns the value of field codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Returns the value of field nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
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
     * Returns the value of field tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Returns the value of field creditos
     *
     * @return integer
     */
    public function getCreditos()
    {
        return $this->creditos;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("materia");
        $this->hasMany('id_materia', 'syl\ean\MateriaPrograma', 'id_materia', ['alias' => 'MateriaPrograma']);
        $this->hasMany('id_materia', 'syl\ean\Syllabus', 'id_materia', ['alias' => 'Syllabus']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'materia';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Materia[]|Materia|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Materia|\Phalcon\Mvc\Model\ResultInterface
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
            'id_materia' => 'id_materia',
            'codigo' => 'codigo',
            'nombre' => 'nombre',
            'descripcion' => 'descripcion',
            'tipo' => 'tipo',
            'creditos' => 'creditos'
        ];
    }

}
