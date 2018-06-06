<?php

namespace syl\ean;

class DetalleSesion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_detalle", type="integer", length=11, nullable=false)
     */
    protected $id_detalle;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_sesion", type="integer", length=11, nullable=false)
     */
    protected $id_sesion;

    /**
     * Method to set the value of field id_detalle
     *
     * @param integer $id_detalle
     * @return $this
     */
    public function setIdDetalle($id_detalle)
    {
        $this->id_detalle = $id_detalle;

        return $this;
    }

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
     * Returns the value of field id_detalle
     *
     * @return integer
     */
    public function getIdDetalle()
    {
        return $this->id_detalle;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("detalle_sesion");
        $this->belongsTo('id_detalle', 'syl\ean\DetalleVersion', 'id_detalle', ['alias' => 'DetalleVersion']);
        $this->belongsTo('id_sesion', 'syl\ean\Sesion', 'id_sesion', ['alias' => 'Sesion']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'detalle_sesion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetalleSesion[]|DetalleSesion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetalleSesion|\Phalcon\Mvc\Model\ResultInterface
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
            'id_detalle' => 'id_detalle',
            'id_sesion' => 'id_sesion'
        ];
    }

}
