<?php

namespace syl\ean;

class SesionComp extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_sesion", type="integer", length=11, nullable=false)
     */
    protected $id_sesion;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_competencia", type="integer", length=11, nullable=false)
     */
    protected $id_competencia;

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
     * Returns the value of field id_sesion
     *
     * @return integer
     */
    public function getIdSesion()
    {
        return $this->id_sesion;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("sesion_comp");
        $this->belongsTo('id_competencia', 'syl\ean\Competencia', 'id_competencia', ['alias' => 'Competencia']);
        $this->belongsTo('id_sesion', 'syl\ean\Sesion', 'id_sesion', ['alias' => 'Sesion']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SesionComp[]|SesionComp|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SesionComp|\Phalcon\Mvc\Model\ResultInterface
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
            'id_competencia' => 'id_competencia'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sesion_comp';
    }

}
