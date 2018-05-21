<?php

namespace syl\ean;

class UsuarioPrograma extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_usuario", type="integer", length=11, nullable=false)
     */
    protected $id_usuario;

    /**
     *
     * @var integer
     * @Primary
     * @Column(column="id_programa", type="integer", length=11, nullable=false)
     */
    protected $id_programa;

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
     * Returns the value of field id_usuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("usuario_programa");
        $this->belongsTo('id_programa', 'syl\ean\Programa', 'id_programa', ['alias' => 'Programa']);
        $this->belongsTo('id_usuario', 'syl\ean\Usuario', 'id_usuario', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuario_programa';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsuarioPrograma[]|UsuarioPrograma|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsuarioPrograma|\Phalcon\Mvc\Model\ResultInterface
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
            'id_usuario' => 'id_usuario',
            'id_programa' => 'id_programa'
        ];
    }

}
