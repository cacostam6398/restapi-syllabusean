<?php

namespace syl\ean;

class DetalleVersion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_detalle", type="integer", length=11, nullable=false)
     */
    protected $id_detalle;

    /**
     *
     * @var integer
     * @Column(column="id_syllabus", type="integer", length=11, nullable=false)
     */
    protected $id_syllabus;

    /**
     *
     * @var string
     * @Column(column="fecha", type="string", nullable=false)
     */
    protected $fecha;

    /**
     *
     * @var string
     * @Column(column="hora", type="string", nullable=false)
     */
    protected $hora;

    /**
     *
     * @var string
     * @Column(column="modalidad", type="string", length=20, nullable=true)
     */
    protected $modalidad;

    /**
     *
     * @var string
     * @Column(column="duracion", type="string", length=12, nullable=true)
     */
    protected $duracion;

    /**
     *
     * @var string
     * @Column(column="proposito", type="string", length=500, nullable=true)
     */
    protected $proposito;

    /**
     *
     * @var integer
     * @Column(column="hrs_directas", type="integer", length=11, nullable=true)
     */
    protected $hrs_directas;

    /**
     *
     * @var integer
     * @Column(column="hrs_autonomas", type="integer", length=11, nullable=true)
     */
    protected $hrs_autonomas;

    /**
     *
     * @var string
     * @Column(column="pre_requisito", type="string", length=250, nullable=true)
     */
    protected $pre_requisito;

    /**
     *
     * @var string
     * @Column(column="co_requisito", type="string", length=250, nullable=true)
     */
    protected $co_requisito;

    /**
     *
     * @var string
     * @Column(column="competencia_global", type="string", length=250, nullable=true)
     */
    protected $competencia_global;

    /**
     *
     * @var string
     * @Column(column="metodologia", type="string", length=250, nullable=true)
     */
    protected $metodologia;

    /**
     *
     * @var string
     * @Column(column="resumen", type="string", length=250, nullable=true)
     */
    protected $resumen;

    /**
     *
     * @var string
     * @Column(column="evaluacion", type="string", length=250, nullable=true)
     */
    protected $evaluacion;

    /**
     *
     * @var string
     * @Column(column="recursos", type="string", length=250, nullable=true)
     */
    protected $recursos;

    /**
     *
     * @var string
     * @Column(column="bibliografia", type="string", length=600, nullable=true)
     */
    protected $bibliografia;

    /**
     *
     * @var string
     * @Column(column="lengua", type="string", length=14, nullable=true)
     */
    protected $lengua;

    /**
     *
     * @var integer
     * @Column(column="pr_lengua", type="integer", length=3, nullable=true)
     */
    protected $pr_lengua;

    /**
     *
     * @var string
     * @Column(column="observacion_version", type="string", length=250, nullable=false)
     */
    protected $observacion_version;

    /**
     *
     * @var integer
     * @Column(column="version", type="integer", length=11, nullable=false)
     */
    protected $version;

    /**
     *
     * @var integer
     * @Column(column="id_usuario", type="integer", length=11, nullable=false)
     */
    protected $id_usuario;

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
     * Method to set the value of field fecha
     *
     * @param string $fecha
     * @return $this
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Method to set the value of field hora
     *
     * @param string $hora
     * @return $this
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Method to set the value of field modalidad
     *
     * @param string $modalidad
     * @return $this
     */
    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;

        return $this;
    }

    /**
     * Method to set the value of field duracion
     *
     * @param string $duracion
     * @return $this
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Method to set the value of field proposito
     *
     * @param string $proposito
     * @return $this
     */
    public function setProposito($proposito)
    {
        $this->proposito = $proposito;

        return $this;
    }

    /**
     * Method to set the value of field hrs_directas
     *
     * @param integer $hrs_directas
     * @return $this
     */
    public function setHrsDirectas($hrs_directas)
    {
        $this->hrs_directas = $hrs_directas;

        return $this;
    }

    /**
     * Method to set the value of field hrs_autonomas
     *
     * @param integer $hrs_autonomas
     * @return $this
     */
    public function setHrsAutonomas($hrs_autonomas)
    {
        $this->hrs_autonomas = $hrs_autonomas;

        return $this;
    }

    /**
     * Method to set the value of field pre_requisito
     *
     * @param string $pre_requisito
     * @return $this
     */
    public function setPreRequisito($pre_requisito)
    {
        $this->pre_requisito = $pre_requisito;

        return $this;
    }

    /**
     * Method to set the value of field co_requisito
     *
     * @param string $co_requisito
     * @return $this
     */
    public function setCoRequisito($co_requisito)
    {
        $this->co_requisito = $co_requisito;

        return $this;
    }

    /**
     * Method to set the value of field competencia_global
     *
     * @param string $competencia_global
     * @return $this
     */
    public function setCompetenciaGlobal($competencia_global)
    {
        $this->competencia_global = $competencia_global;

        return $this;
    }

    /**
     * Method to set the value of field metodologia
     *
     * @param string $metodologia
     * @return $this
     */
    public function setMetodologia($metodologia)
    {
        $this->metodologia = $metodologia;

        return $this;
    }

    /**
     * Method to set the value of field resumen
     *
     * @param string $resumen
     * @return $this
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;

        return $this;
    }

    /**
     * Method to set the value of field evaluacion
     *
     * @param string $evaluacion
     * @return $this
     */
    public function setEvaluacion($evaluacion)
    {
        $this->evaluacion = $evaluacion;

        return $this;
    }

    /**
     * Method to set the value of field recursos
     *
     * @param string $recursos
     * @return $this
     */
    public function setRecursos($recursos)
    {
        $this->recursos = $recursos;

        return $this;
    }

    /**
     * Method to set the value of field bibliografia
     *
     * @param string $bibliografia
     * @return $this
     */
    public function setBibliografia($bibliografia)
    {
        $this->bibliografia = $bibliografia;

        return $this;
    }

    /**
     * Method to set the value of field lengua
     *
     * @param string $lengua
     * @return $this
     */
    public function setLengua($lengua)
    {
        $this->lengua = $lengua;

        return $this;
    }

    /**
     * Method to set the value of field pr_lengua
     *
     * @param integer $pr_lengua
     * @return $this
     */
    public function setPrLengua($pr_lengua)
    {
        $this->pr_lengua = $pr_lengua;

        return $this;
    }

    /**
     * Method to set the value of field observacion_version
     *
     * @param string $observacion_version
     * @return $this
     */
    public function setObservacionVersion($observacion_version)
    {
        $this->observacion_version = $observacion_version;

        return $this;
    }

    /**
     * Method to set the value of field version
     *
     * @param integer $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

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
     * Returns the value of field id_detalle
     *
     * @return integer
     */
    public function getIdDetalle()
    {
        return $this->id_detalle;
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
     * Returns the value of field fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Returns the value of field hora
     *
     * @return string
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Returns the value of field modalidad
     *
     * @return string
     */
    public function getModalidad()
    {
        return $this->modalidad;
    }

    /**
     * Returns the value of field duracion
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Returns the value of field proposito
     *
     * @return string
     */
    public function getProposito()
    {
        return $this->proposito;
    }

    /**
     * Returns the value of field hrs_directas
     *
     * @return integer
     */
    public function getHrsDirectas()
    {
        return $this->hrs_directas;
    }

    /**
     * Returns the value of field hrs_autonomas
     *
     * @return integer
     */
    public function getHrsAutonomas()
    {
        return $this->hrs_autonomas;
    }

    /**
     * Returns the value of field pre_requisito
     *
     * @return string
     */
    public function getPreRequisito()
    {
        return $this->pre_requisito;
    }

    /**
     * Returns the value of field co_requisito
     *
     * @return string
     */
    public function getCoRequisito()
    {
        return $this->co_requisito;
    }

    /**
     * Returns the value of field competencia_global
     *
     * @return string
     */
    public function getCompetenciaGlobal()
    {
        return $this->competencia_global;
    }

    /**
     * Returns the value of field metodologia
     *
     * @return string
     */
    public function getMetodologia()
    {
        return $this->metodologia;
    }

    /**
     * Returns the value of field resumen
     *
     * @return string
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * Returns the value of field evaluacion
     *
     * @return string
     */
    public function getEvaluacion()
    {
        return $this->evaluacion;
    }

    /**
     * Returns the value of field recursos
     *
     * @return string
     */
    public function getRecursos()
    {
        return $this->recursos;
    }

    /**
     * Returns the value of field bibliografia
     *
     * @return string
     */
    public function getBibliografia()
    {
        return $this->bibliografia;
    }

    /**
     * Returns the value of field lengua
     *
     * @return string
     */
    public function getLengua()
    {
        return $this->lengua;
    }

    /**
     * Returns the value of field pr_lengua
     *
     * @return integer
     */
    public function getPrLengua()
    {
        return $this->pr_lengua;
    }

    /**
     * Returns the value of field observacion_version
     *
     * @return string
     */
    public function getObservacionVersion()
    {
        return $this->observacion_version;
    }

    /**
     * Returns the value of field version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean");
        $this->setSource("detalle_version");
        $this->hasMany('id_detalle', 'syl\ean\DetalleSesion', 'id_detalle', ['alias' => 'DetalleSesion']);
        $this->hasMany('id_detalle', 'syl\ean\Syllabus', 'version_actual', ['alias' => 'Syllabus']);
        $this->belongsTo('id_syllabus', 'syl\ean\Syllabus', 'id_syllabus', ['alias' => 'Syllabus']);
        $this->belongsTo('id_usuario', 'syl\ean\Usuario', 'id_usuario', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'detalle_version';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetalleVersion[]|DetalleVersion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetalleVersion|\Phalcon\Mvc\Model\ResultInterface
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
            'id_syllabus' => 'id_syllabus',
            'fecha' => 'fecha',
            'hora' => 'hora',
            'modalidad' => 'modalidad',
            'duracion' => 'duracion',
            'proposito' => 'proposito',
            'hrs_directas' => 'hrs_directas',
            'hrs_autonomas' => 'hrs_autonomas',
            'pre_requisito' => 'pre_requisito',
            'co_requisito' => 'co_requisito',
            'competencia_global' => 'competencia_global',
            'metodologia' => 'metodologia',
            'resumen' => 'resumen',
            'evaluacion' => 'evaluacion',
            'recursos' => 'recursos',
            'bibliografia' => 'bibliografia',
            'lengua' => 'lengua',
            'pr_lengua' => 'pr_lengua',
            'observacion_version' => 'observacion_version',
            'version' => 'version',
            'id_usuario' => 'id_usuario'
        ];
    }

}
