<?php

namespace syl\ean;

class Usuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_usuario", type="integer", length=11, nullable=false)
     */
    protected $id_usuario;

    /**
     *
     * @var integer
     * @Column(column="id_rol", type="integer", length=11, nullable=false)
     */
    protected $id_rol;

    /**
     *
     * @var string
     * @Column(column="nombre", type="string", length=80, nullable=false)
     */
    protected $nombre;

    /**
     *
     * @var string
     * @Column(column="apellido", type="string", length=80, nullable=false)
     */
    protected $apellido;

    /**
     *
     * @var string
     * @Column(column="correo", type="string", length=100, nullable=false)
     */
    protected $correo;

    /**
     *
     * @var string
     * @Column(column="telefono", type="string", length=15, nullable=true)
     */
    protected $telefono;

    /**
     *
     * @var string
     * @Column(column="celular", type="string", length=15, nullable=true)
     */
    protected $celular;

    /**
     *
     * @var string
     * @Column(column="cedula", type="string", length=15, nullable=true)
     */
    protected $cedula;

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
     * Method to set the value of field id_rol
     *
     * @param integer $id_rol
     * @return $this
     */
    public function setIdRol($id_rol)
    {
        $this->id_rol = $id_rol;

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
     * Method to set the value of field apellido
     *
     * @param string $apellido
     * @return $this
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Method to set the value of field correo
     *
     * @param string $correo
     * @return $this
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Method to set the value of field telefono
     *
     * @param string $telefono
     * @return $this
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Method to set the value of field celular
     *
     * @param string $celular
     * @return $this
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Method to set the value of field cedula
     *
     * @param string $cedula
     * @return $this
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

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
     * Returns the value of field id_rol
     *
     * @return integer
     */
    public function getIdRol()
    {
        return $this->id_rol;
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
     * Returns the value of field apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Returns the value of field correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Returns the value of field telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Returns the value of field celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Returns the value of field cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("usuario");
        $this->hasMany('id_usuario', 'syl\ean\DetalleVersion', 'id_usuario', ['alias' => 'DetalleVersion']);
        $this->hasMany('id_usuario', 'syl\ean\Syllabus', 'aprobo', ['alias' => 'Syllabus']);
        $this->hasMany('id_usuario', 'syl\ean\Syllabus', 'reviso', ['alias' => 'Syllabus']);
        $this->hasMany('id_usuario', 'syl\ean\Syllabus', 'id_usuario', ['alias' => 'Syllabus']);
        $this->hasMany('id_usuario', 'syl\ean\UsuarioPrograma', 'id_usuario', ['alias' => 'UsuarioPrograma']);
        $this->belongsTo('id_rol', 'syl\ean\Rol', 'id_rol', ['alias' => 'Rol']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario[]|Usuario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario|\Phalcon\Mvc\Model\ResultInterface
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
            'id_rol' => 'id_rol',
            'nombre' => 'nombre',
            'apellido' => 'apellido',
            'correo' => 'correo',
            'telefono' => 'telefono',
            'celular' => 'celular',
            'cedula' => 'cedula'
        ];
    }

}
