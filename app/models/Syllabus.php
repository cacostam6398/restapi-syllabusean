<?php

namespace syl\ean;

class Syllabus extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_syllabus", type="integer", length=11, nullable=false)
     */
    protected $id_syllabus;

    /**
     *
     * @var string
     * @Column(column="fec_creacion", type="string", nullable=false)
     */
    protected $fec_creacion;

    /**
     *
     * @var string
     * @Column(column="observacion", type="string", length=250, nullable=true)
     */
    protected $observacion;

    /**
     *
     * @var string
     * @Column(column="status", type="string", length=1, nullable=false)
     */
    protected $status;

    /**
     *
     * @var integer
     * @Column(column="version_actual", type="integer", length=11, nullable=true)
     */
    protected $version_actual;

    /**
     *
     * @var integer
     * @Column(column="id_usuario", type="integer", length=11, nullable=false)
     */
    protected $id_usuario;

    /**
     *
     * @var integer
     * @Column(column="id_materia", type="integer", length=11, nullable=false)
     */
    protected $id_materia;

    /**
     *
     * @var integer
     * @Column(column="reviso", type="integer", length=11, nullable=true)
     */
    protected $reviso;

    /**
     *
     * @var integer
     * @Column(column="aprobo", type="integer", length=11, nullable=true)
     */
    protected $aprobo;

    /**
     * Method to set the value of field id_syllabus
     *
     * @param integer $id_syllabus
     * @return $this
     */
    public function setIdSyllabus($id_syllabus)
    {
        $this->id_syllabus = $id_syllabus;

        return $this;
    }

    /**
     * Method to set the value of field fec_creacion
     *
     * @param string $fec_creacion
     * @return $this
     */
    public function setFecCreacion($fec_creacion)
    {
        $this->fec_creacion = $fec_creacion;

        return $this;
    }

    /**
     * Method to set the value of field observacion
     *
     * @param string $observacion
     * @return $this
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field version_actual
     *
     * @param integer $version_actual
     * @return $this
     */
    public function setVersionActual($version_actual)
    {
        $this->version_actual = $version_actual;

        return $this;
    }

    /**
     * Method to set the value of field id_usuario
     *
     * @param integer $id_usuario
     * @return $this
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

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
     * Method to set the value of field reviso
     *
     * @param integer $reviso
     * @return $this
     */
    public function setReviso($reviso)
    {
        $this->reviso = $reviso;

        return $this;
    }

    /**
     * Method to set the value of field aprobo
     *
     * @param integer $aprobo
     * @return $this
     */
    public function setAprobo($aprobo)
    {
        $this->aprobo = $aprobo;

        return $this;
    }

    /**
     * Returns the value of field id_syllabus
     *
     * @return integer
     */
    public function getIdSyllabus()
    {
        return $this->id_syllabus;
    }

    /**
     * Returns the value of field fec_creacion
     *
     * @return string
     */
    public function getFecCreacion()
    {
        return $this->fec_creacion;
    }

    /**
     * Returns the value of field observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field version_actual
     *
     * @return integer
     */
    public function getVersionActual()
    {
        return $this->version_actual;
    }

    /**
     * Returns the value of field id_usuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
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
     * Returns the value of field reviso
     *
     * @return integer
     */
    public function getReviso()
    {
        return $this->reviso;
    }

    /**
     * Returns the value of field aprobo
     *
     * @return integer
     */
    public function getAprobo()
    {
        return $this->aprobo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("syllabus");
        $this->hasMany('id_syllabus', 'syl\ean\DetalleVersion', 'id_syllabus', ['alias' => 'DetalleVersion']);
        $this->belongsTo('aprobo', 'syl\ean\Usuario', 'id_usuario', ['alias' => 'Usuario']);
        $this->belongsTo('version_actual', 'syl\ean\DetalleVersion', 'id_detalle', ['alias' => 'DetalleVersion']);
        $this->belongsTo('id_materia', 'syl\ean\Materia', 'id_materia', ['alias' => 'Materia']);
        $this->belongsTo('reviso', 'syl\ean\Usuario', 'id_usuario', ['alias' => 'Usuario']);
        $this->belongsTo('id_usuario', 'syl\ean\Usuario', 'id_usuario', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'syllabus';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Syllabus[]|Syllabus|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Syllabus|\Phalcon\Mvc\Model\ResultInterface
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
            'id_syllabus' => 'id_syllabus',
            'fec_creacion' => 'fec_creacion',
            'observacion' => 'observacion',
            'status' => 'status',
            'version_actual' => 'version_actual',
            'id_usuario' => 'id_usuario',
            'id_materia' => 'id_materia',
            'reviso' => 'reviso',
            'aprobo' => 'aprobo'
        ];
    }

}
