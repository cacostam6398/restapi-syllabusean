<?php

namespace syl\ean;

class Programa extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_programa", type="integer", length=11, nullable=false)
     */
    protected $id_programa;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", length=100, nullable=false)
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
     * @Column(column="facultad", type="string", length=100, nullable=false)
     */
    protected $facultad;

    /**
     * Method to set the value of field id_programa
     *
     * @param integer $id_programa
     * @return $this
     */
    public function setIdPrograma($id_programa)
    {
        $this->id_programa = $id_programa;

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
     * Method to set the value of field facultad
     *
     * @param string $facultad
     * @return $this
     */
    public function setFacultad($facultad)
    {
        $this->facultad = $facultad;

        return $this;
    }

    /**
     * Returns the value of field id_programa
     *
     * @return integer
     */
    public function getIdPrograma()
    {
        return $this->id_programa;
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
     * Returns the value of field facultad
     *
     * @return string
     */
    public function getFacultad()
    {
        return $this->facultad;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("programa");
        $this->hasMany('id_programa', 'syl\ean\MateriaPrograma', 'id_programa', ['alias' => 'MateriaPrograma']);
        $this->hasMany('id_programa', 'syl\ean\UsuarioPrograma', 'id_programa', ['alias' => 'UsuarioPrograma']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'programa';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Programa[]|Programa|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Programa|\Phalcon\Mvc\Model\ResultInterface
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
            'id_programa' => 'id_programa',
            'nombre' => 'nombre',
            'descripcion' => 'descripcion',
            'facultad' => 'facultad'
        ];
    }

}
