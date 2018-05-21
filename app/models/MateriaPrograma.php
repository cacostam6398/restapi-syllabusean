<?php

namespace syl\ean;

class MateriaPrograma extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_programa", type="integer", length=11, nullable=false)
     */
    protected $id_programa;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_materia", type="integer", length=11, nullable=false)
     */
    protected $id_materia;

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
     * Returns the value of field id_programa
     *
     * @return integer
     */
    public function getIdPrograma()
    {
        return $this->id_programa;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("materia_programa");
        $this->belongsTo('id_materia', 'syl\ean\Materia', 'id_materia', ['alias' => 'Materia']);
        $this->belongsTo('id_programa', 'syl\ean\Programa', 'id_programa', ['alias' => 'Programa']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'materia_programa';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MateriaPrograma[]|MateriaPrograma|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MateriaPrograma|\Phalcon\Mvc\Model\ResultInterface
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
            'id_materia' => 'id_materia'
        ];
    }

}
