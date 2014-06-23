<?php

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Epublica\AlertaBundle\Entity\Alerta;
use Epublica\ListaBundle\Entity\Lista;
use Epublica\ObligacionBundle\Entity\Obligacion;
use Epublica\UsuarioBundle\Entity\Usuario;

class Basico implements FixtureInterface, ContainerAwareInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {

        /* Listas */

        $listas = array('Municipal 2014', 'Autonómica 2014');

        foreach ($listas as $l) {
            $lis = new Lista();
            $lis->setNombre($l);
            $manager->persist($lis);
        }

        $manager->flush();

        $listas = $manager->getRepository('ListaBundle:Lista')->findAll();

        /* Obligaciones */

        $obligaciones_municipal = array(
            array('Información sobre los marcos presupuestarios', '15/03', 'Le recordamos que en cumplimiento del artículo 6 de la Orden HAP/2150/2012 debe remitir al Ministerio los marcos presupuestarios a medio plazo en los que se enmarcará la elaboración de sus Presupuesto anuales.'),
            array('Obligaciones anuales de suministro de información', '01/10', 'Le recordamos que en cumplimiento del artículo 15. 1 a) de la Orden HAP/2105/2012 debe remitir al Ministerio las líneas fundamentales de los Presupuestos para el ejercicio siguiente o de los estados financieros.'),
            array('Obligaciones anuales de suministro de información', '01/10', 'Le recordamos que en cumplimiento del artículo 15. 1 b) de la Orden HAP/2105/2012 debe remitir al Ministerio la información el estado de previsión de movimiento y situación de la deuda.'),
            array('Obligaciones anuales de suministro de información', '01/10', 'Le recordamos que en cumplimiento del artículo 15. 1 c) de la Orden HAP/2105/2012 debe remitir al Ministerio la información que permita relacionar el saldo resultante de los ingresos y gastos de las líneas fundamentales del Presupuesto con la capacidad o necesidad de financiación, calculada conforme a las normas del Sistema Europe de Cuentas.'),
            array('Obligaciones anuales de suministro de información', '01/10', 'Le recordamos que en cumplimiento del artículo 15. 1 d) de la Orden HAP/2105/2012 debe remitir al Ministerio el informe de la intervención de evaluación del cumplimiento del objetivo de estabilidad, de la regla del gasto y del límite de deuda.'),
            array('Obligaciones anuales de suministro de información', '31/01', 'Le recordamos que en cumplimiento del artículo 15. 2 a) de la Orden HAP/2105/2012 debe remitir al Ministerio los presupuestos aprobados y los estados financieros iniciales de todos los sujetos y entidades comprendidos en el ámbito de aplicación de esta Orden, de las inversiones previstas realizar en ejercicio y en los tres siguientes, con su correspondiente propuesta de financiación y los estados de previsión de movimiento y situación de la deuda.    Si a 31 de enero no se hubiera aprobado el Presupuesto, deberá remitirse el prorrogado con las modificaciones derivdadas de las normas reguladoras de la prórroga, hasta la entrada en vigor del nuevo Presupuesto.'),
            array('Obligaciones anuales de suministro de información', '31/01', 'Le recordamos que en cumplimiento del artículo 15.2 b) de la Orden HAP/2105/2012 debe remitir al Ministerio la información que permita relacionar el saldo resultante de los ingresos y gastos del presupuesto con la capacidad necesaria de financiación, calculada conforme a las normas del Sistema Europeo de Cuentas.'),
            array('Obligaciones anuales de suministro de información', '31/01', 'Le recordamos que en cumplimiento del artículo 15.2 c) de la Orden HAP/2105/2012 debe remitir al Ministerio el informe de la intervención de evaluación del cumplimiento del objetivo de estabilidad, de la regla de gasto y del límite de la deuda.'),
            array('Obligaciones anuales de suministro de información', '31/01', 'Le recordamos que en cumplimiento del artículo 15.2 d) de la Orden HAP/2105/2012 debe remitir al Ministeriorla información relativa al personal de las entidades: - Órganos estatutarios. - Retribuciones básicas, complementarias, acción social, aportaciones a planes de pensiones, cotizaciones al sistema de seguridad social a cargo del empleador e indemnizaciones. - Efectivos por clases de personal, incluyendo altos cargos. - Dotaciones o plantillas presupuestarias de personal, con el desglose orgánico.        Se remitirá información sobre los efectivos de personal: - Número de efectivos y clases de personal. - Todas las retribuciones diferenciando básicas de complementarias asignadas al personal. - El número de efectivos por modalidades de jornada.'),
            array('Obligaciones anuales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 15.3 a) de la Orden HAP/2105/2012 debe remitir al Ministerio los presupuestos liquidados y las cuentas anuales formuladas por los sujetos y entidades sometidos al Plan General de Contabilidad de Empresas o a sus adaptaciones sectoriales, con sus anexos y estados complementarios.'),
            array('Obligaciones anuales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 15.3 b) de la Orden HAP/2105/2012 debe remitir al Ministerio las obligaciones frente a terceros, vencidas, liquidas, exigibles no imputadas a presupuesto.'),
            array('Obligaciones anuales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 15.3 c) de la Orden HAP/2105/2012 debe informar al Ministerio de la situación a 31 de diciembre del ejercicio anterior de la deuda viva, incluidos los cuadros de amortización.'),
            array('Obligaciones anuales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 15.3 d) de la Orden HAP/2105/2012 debe remitir al Ministerio la información que permita relacionar el saldo resultante de los ingresos y gastos del Presupuesto con la capacidad y necesidad de financiación, calculada conforme a las normas del Sistema Europeo de Cuentas.'),
            array('Obligaciones anuales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 15.3 e) de la Orden HAP/2105/2012 debe remitir al Ministerio la información de la intervención de evaluación del cumplimiento del objetivo de estabilidad, de la regla de gasto y del límite de la deuda.'),
            array('Obligaciones anuales de suministro de información', '31/10', 'Le recordamos que en cumplimiento del artículo 15.4 a) de la Orden HAP/2105/2012 debe remitir al Ministerio las cuentas anuales aprobadas por la junta general de accionistas u órgano competente acompañada de un informe de auditoría de todos los sujetos y entidades comprendidos en el ámbito de dicha Orden.'),
            array('Obligaciones anuales de suministro de información', '31/10', 'Le recordamos que en cumplimiento del artículo 15.4 b) de la Orden HAP/2105/2012 debe remitir al Ministerio la copia de la cuenta general así como los documentos adicionales precisos para obtener la siguiente información: liquidación del presupuesto completa, detalle de operaciones no presupuestarias, estado de la deuda,  includa la deuda aplazada en convenio con otras Administraciones Públicas y avales otorgados.'),
            array('Obligaciones anuales de suministro de información', '31/10', 'Le recordamos que en cumplimiento del artículo 15.4 c) de la Orden HAP/2105/2012 debe remitir al Ministerio la siguiente información relativa al personal de las entidades: - Órganos estatutarios. - Retribuciones básicas, complementarias, acción social, aportaciones a planes de pensiones, cotizaciones al sistema de seguridad social a cargo del empleador e indemnizaciones. - Efectivos por clases de personal, incluyendo altos cargos. - Dotaciones o plantillas presupuestarias de personal, con el desglose orgánico.        Se remitirá información sobre los efectivos de personal: - Número de efectivos y clases de personal. - Todas las retribuciones diferenciando básicas de complementarias asignadas al personal. - El número de efectivos por modalidades de jornada.'),
            array('Obligaciones trimestrales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 16. 1 de la Orden HAP/2105/2012 debe remitir al Ministerio la actualización de los presupuestos en ejecución, incorporadas las modificaciones presupuestarias ya tramitadas y/o  las previstas tramitar hasta final de año, y de las previsiones de ingresos y gastos de las entidades sujetas al Plan general de Contabilidad de Empresas o a sus adaptaciones sectoriales, y sus estados complementarios.'),
            array('Obligaciones trimestrales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 16.2 de la Orden HAP/2105/2012 debe remitir al Ministerio las obligaciones frente a terceros, vencidas, líquidas, exigibles, no imputadas a presupuesto.'),
            array('Obligaciones trimestrales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 16. 3 de la Orden HAP/2105/2012 debe remitir al Ministerio la información que permita relacionar el saldo resultante de los ingresos y gastos del presupuesto con la capacidad o necesidad de financiación, calculada conforme a las normas del Sistema Europeo de Cuentas.'),
            array('Obligaciones trimestrales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 16.4 de la Orden HAP/2105/2012 debe remitir al Ministerio la actualización del informe de la intervención del cumplimiento del objetivo de estabilidad, de la regla de gasto y del límite de la deuda.'),
            array('Obligaciones trimestrales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 16.5 de la Orden HAP/2105/2012 debe remitir al Ministerio un resumen del estado de ejecución del presupuesto, y de sus estados complementarios, con indiciación de los derechos recaudados del ejercicio corriente y de los ejercicios cerrados y las desviaciones respecto a las previsiones. Así como los estados de ejecución de los ingresos y gastos para las entidades sujetas al Plan General de Contabilidad de Empresas o a sus adaptaciones sectoriales.'),
            array('Obligaciones trimestrales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 16.6 de la Orden HAP/2105/2012 debe remitir al Ministerio la situación de los compromisos de gastos plurianuales y la ejecución del anexo de inversiones y su financiación.'),
            array('Obligaciones trimestrales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 16.7 de la Orden HAP/2105/2012 debe remitir al Ministerio el informe trimestral regulado en el artículo 4 de la Ley 15/2010 de 5 de julio.'),
            array('Obligaciones trimestrales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 16.8 de la Orden HAP/2105/2012 debe remitir al Ministerio  las actualizaciones de su Plan de tesorería y detalles de las operaciones de deuda viva que contendrá al menos información relativa a : - Calendario y presupuesto de Tesorería que contenga sus cobros y pagos mensuales por rúbricas incluynedo la previsión de su múnumo mensual de tesorería. - Previsión mensual de ingresos. - Saldo de deuda pública. - Impacto de medidas de ahorro y medidas de ingresos previstas y calendario previsto de impacto en presupuesto. - Vencimientos mensuales de deuda a corto y largo plazo. - Calendario y cuantías de necesidades de endeudamiento. - Evolución del salgo de las obligaciones reconocidas pendientes de pago tanto del ejercicio corriente como de los años anteriores.  - Perfil de vencimientos de la deuda de los próximos diez años. '),
            array('Obligaciones trimestrales de suministro de información', '31/03', 'Le recordamos que en cumplimiento del artículo 16.9  de la Orden HAP/2105/2012 debe remitir al Ministerio la información relativa al personal de las entidades: - Órganos estatutarios. - Retribuciones básicas, complementarias, acción social, aportaciones a planes de pensiones, cotizaciones al sistema de seguridad social a cargo del empleador e indemnizaciones. - Efectivos por clases de personal, incluyendo altos cargos. - Dotaciones o plantillas presupuestarias de personal, con el desglose orgánico.        Se remitirá información sobre los efectivos de personal: - Número de efectivos y clases de personal. - Todas las retribuciones diferenciando básicas de complementarias asignadas al personal. - El número de efectivos por modalidades de jornada.'),
            array('Obligaciones trimestrales de suministro de información', '31/06', 'Le recordamos que en cumplimiento del artículo 16. 1 de la Orden HAP/2105/2012 debe remitir al Ministerio la actualización de los presupuestos en ejecución, incorporadas las modificaciones presupuestarias ya tramitadas y/o  las previstas tramitar hasta final de año, y de las previsiones de ingresos y gastos de las entidades sujetas al Plan general de Contabilidad de Empresas o a sus adaptaciones sectoriales, y sus estados complementarios.'),
            array('Obligaciones trimestrales de suministro de información', '31/06', 'Le recordamos que en cumplimiento del artículo 16.2 de la Orden HAP/2105/2012 debe remitir al Ministerio las obligaciones frente a terceros, vencidas, líquidas, exigibles, no imputadas a presupuesto.'),
            array('Obligaciones trimestrales de suministro de información', '31/06', 'Le recordamos que en cumplimiento del artículo 16. 3 de la Orden HAP/2105/2012 debe remitir al Ministerio la información que permita relacionar el saldo resultante de los ingresos y gastos del presupuesto con la capacidad o necesidad de financiación, calculada conforme a las normas del Sistema Europeo de Cuentas.'),
            array('Obligaciones trimestrales de suministro de información', '31/06', 'Le recordamos que en cumplimiento del artículo 16.4 de la Orden HAP/2105/2012 debe remitir al Ministerio la actualización del informe de la intervención del cumplimiento del objetivo de estabilidad, de la regla de gasto y del límite de la deuda.'),
            array('Obligaciones trimestrales de suministro de información', '31/06', 'Le recordamos que en cumplimiento del artículo 16.5 de la Orden HAP/2105/2012 debe remitir al Ministerio un resumen del estado de ejecución del presupuesto, y de sus estados complementarios, con indiciación de los derechos recaudados del ejercicio corriente y de los ejercicios cerrados y las desviaciones respecto a las previsiones. Así como los estados de ejecución de los ingresos y gastos para las entidades sujetas al Plan General de Contabilidad de Empresas o a sus adaptaciones sectoriales.'),
            array('Obligaciones trimestrales de suministro de información', '31/06', 'Le recordamos que en cumplimiento del artículo 16.6 de la Orden HAP/2105/2012 debe remitir al Ministerio la situación de los compromisos de gastos plurianuales y la ejecución del anexo de inversiones y su financiación.'),
            array('Obligaciones trimestrales de suministro de información', '31/06', 'Le recordamos que en cumplimiento del artículo 16.7 de la Orden HAP/2105/2012 debe remitir al Ministerio el informe trimestral regulado en el artículo 4 de la Ley 15/2010 de 5 de julio.'),
            array('Obligaciones trimestrales de suministro de información', '31/06', 'Le recordamos que en cumplimiento del artículo 16.8 de la Orden HAP/2105/2012 debe remitir al Ministerio  las actualizaciones de su Plan de tesorería y detalles de las operaciones de deuda viva que contendrá al menos información relativa a : - Calendario y presupuesto de Tesorería que contenga sus cobros y pagos mensuales por rúbricas incluynedo la previsión de su múnumo mensual de tesorería. - Previsión mensual de ingresos. - Saldo de deuda pública. - Impacto de medidas de ahorro y medidas de ingresos previstas y calendario previsto de impacto en presupuesto. - Vencimientos mensuales de deuda a corto y largo plazo. - Calendario y cuantías de necesidades de endeudamiento. - Evolución del salgo de las obligaciones reconocidas pendientes de pago tanto del ejercicio corriente como de los años anteriores.  - Perfil de vencimientos de la deuda de los próximos diez años. '),
            array('Obligaciones trimestrales de suministro de información', '31/06', 'Le recordamos que en cumplimiento del artículo 16.9  de la Orden HAP/2105/2012 debe remitir al Ministerio la información relativa al personal de las entidades: - Órganos estatutarios. - Retribuciones básicas, complementarias, acción social, aportaciones a planes de pensiones, cotizaciones al sistema de seguridad social a cargo del empleador e indemnizaciones. - Efectivos por clases de personal, incluyendo altos cargos. - Dotaciones o plantillas presupuestarias de personal, con el desglose orgánico.        Se remitirá información sobre los efectivos de personal: - Número de efectivos y clases de personal. - Todas las retribuciones diferenciando básicas de complementarias asignadas al personal. - El número de efectivos por modalidades de jornada.'),
            array('Obligaciones trimestrales de suministro de información', '31/09', 'Le recordamos que en cumplimiento del artículo 16. 1 de la Orden HAP/2105/2012 debe remitir al Ministerio la actualización de los presupuestos en ejecución, incorporadas las modificaciones presupuestarias ya tramitadas y/o  las previstas tramitar hasta final de año, y de las previsiones de ingresos y gastos de las entidades sujetas al Plan general de Contabilidad de Empresas o a sus adaptaciones sectoriales, y sus estados complementarios.'),
            array('Obligaciones trimestrales de suministro de información', '31/09', 'Le recordamos que en cumplimiento del artículo 16.2 de la Orden HAP/2105/2012 debe remitir al Ministerio las obligaciones frente a terceros, vencidas, líquidas, exigibles, no imputadas a presupuesto.'),
            array('Obligaciones trimestrales de suministro de información', '31/09', 'Le recordamos que en cumplimiento del artículo 16. 3 de la Orden HAP/2105/2012 debe remitir al Ministerio la información que permita relacionar el saldo resultante de los ingresos y gastos del presupuesto con la capacidad o necesidad de financiación, calculada conforme a las normas del Sistema Europeo de Cuentas.'),
            array('Obligaciones trimestrales de suministro de información', '31/09', 'Le recordamos que en cumplimiento del artículo 16.4 de la Orden HAP/2105/2012 debe remitir al Ministerio la actualización del informe de la intervención del cumplimiento del objetivo de estabilidad, de la regla de gasto y del límite de la deuda.'),
            array('Obligaciones trimestrales de suministro de información', '31/09', 'Le recordamos que en cumplimiento del artículo 16.5 de la Orden HAP/2105/2012 debe remitir al Ministerio un resumen del estado de ejecución del presupuesto, y de sus estados complementarios, con indiciación de los derechos recaudados del ejercicio corriente y de los ejercicios cerrados y las desviaciones respecto a las previsiones. Así como los estados de ejecución de los ingresos y gastos para las entidades sujetas al Plan General de Contabilidad de Empresas o a sus adaptaciones sectoriales.'),
            array('Obligaciones trimestrales de suministro de información', '31/09', 'Le recordamos que en cumplimiento del artículo 16.6 de la Orden HAP/2105/2012 debe remitir al Ministerio la situación de los compromisos de gastos plurianuales y la ejecución del anexo de inversiones y su financiación.'),
            array('Obligaciones trimestrales de suministro de información', '31/09', 'Le recordamos que en cumplimiento del artículo 16.7 de la Orden HAP/2105/2012 debe remitir al Ministerio el informe trimestral regulado en el artículo 4 de la Ley 15/2010 de 5 de julio.'),
            array('Obligaciones trimestrales de suministro de información', '31/09', 'Le recordamos que en cumplimiento del artículo 16.8 de la Orden HAP/2105/2012 debe remitir al Ministerio  las actualizaciones de su Plan de tesorería y detalles de las operaciones de deuda viva que contendrá al menos información relativa a : - Calendario y presupuesto de Tesorería que contenga sus cobros y pagos mensuales por rúbricas incluynedo la previsión de su múnumo mensual de tesorería. - Previsión mensual de ingresos. - Saldo de deuda pública. - Impacto de medidas de ahorro y medidas de ingresos previstas y calendario previsto de impacto en presupuesto. - Vencimientos mensuales de deuda a corto y largo plazo. - Calendario y cuantías de necesidades de endeudamiento. - Evolución del salgo de las obligaciones reconocidas pendientes de pago tanto del ejercicio corriente como de los años anteriores.  - Perfil de vencimientos de la deuda de los próximos diez años. '),
            array('Obligaciones trimestrales de suministro de información', '31/09', 'Le recordamos que en cumplimiento del artículo 16.9  de la Orden HAP/2105/2012 debe remitir al Ministerio la información relativa al personal de las entidades: - Órganos estatutarios. - Retribuciones básicas, complementarias, acción social, aportaciones a planes de pensiones, cotizaciones al sistema de seguridad social a cargo del empleador e indemnizaciones. - Efectivos por clases de personal, incluyendo altos cargos. - Dotaciones o plantillas presupuestarias de personal, con el desglose orgánico.        Se remitirá información sobre los efectivos de personal: - Número de efectivos y clases de personal. - Todas las retribuciones diferenciando básicas de complementarias asignadas al personal. - El número de efectivos por modalidades de jornada.'),
            array('Obligaciones trimestrales de suministro de información', '31/12', 'Le recordamos que en cumplimiento del artículo 16. 1 de la Orden HAP/2105/2012 debe remitir al Ministerio la actualización de los presupuestos en ejecución, incorporadas las modificaciones presupuestarias ya tramitadas y/o  las previstas tramitar hasta final de año, y de las previsiones de ingresos y gastos de las entidades sujetas al Plan general de Contabilidad de Empresas o a sus adaptaciones sectoriales, y sus estados complementarios.'),
            array('Obligaciones trimestrales de suministro de información', '31/12', 'Le recordamos que en cumplimiento del artículo 16.2 de la Orden HAP/2105/2012 debe remitir al Ministerio las obligaciones frente a terceros, vencidas, líquidas, exigibles, no imputadas a presupuesto.'),
            array('Obligaciones trimestrales de suministro de información', '31/12', 'Le recordamos que en cumplimiento del artículo 16. 3 de la Orden HAP/2105/2012 debe remitir al Ministerio la información que permita relacionar el saldo resultante de los ingresos y gastos del presupuesto con la capacidad o necesidad de financiación, calculada conforme a las normas del Sistema Europeo de Cuentas.'),
            array('Obligaciones trimestrales de suministro de información', '31/12', 'Le recordamos que en cumplimiento del artículo 16.4 de la Orden HAP/2105/2012 debe remitir al Ministerio la actualización del informe de la intervención del cumplimiento del objetivo de estabilidad, de la regla de gasto y del límite de la deuda.'),
            array('Obligaciones trimestrales de suministro de información', '31/12', 'Le recordamos que en cumplimiento del artículo 16.5 de la Orden HAP/2105/2012 debe remitir al Ministerio un resumen del estado de ejecución del presupuesto, y de sus estados complementarios, con indiciación de los derechos recaudados del ejercicio corriente y de los ejercicios cerrados y las desviaciones respecto a las previsiones. Así como los estados de ejecución de los ingresos y gastos para las entidades sujetas al Plan General de Contabilidad de Empresas o a sus adaptaciones sectoriales.'),
            array('Obligaciones trimestrales de suministro de información', '31/12', 'Le recordamos que en cumplimiento del artículo 16.6 de la Orden HAP/2105/2012 debe remitir al Ministerio la situación de los compromisos de gastos plurianuales y la ejecución del anexo de inversiones y su financiación.'),
            array('Obligaciones trimestrales de suministro de información', '31/12', 'Le recordamos que en cumplimiento del artículo 16.7 de la Orden HAP/2105/2012 debe remitir al Ministerio el informe trimestral regulado en el artículo 4 de la Ley 15/2010 de 5 de julio.'),
            array('Obligaciones trimestrales de suministro de información', '31/12', 'Le recordamos que en cumplimiento del artículo 16.8 de la Orden HAP/2105/2012 debe remitir al Ministerio  las actualizaciones de su Plan de tesorería y detalles de las operaciones de deuda viva que contendrá al menos información relativa a : - Calendario y presupuesto de Tesorería que contenga sus cobros y pagos mensuales por rúbricas incluynedo la previsión de su múnumo mensual de tesorería. - Previsión mensual de ingresos. - Saldo de deuda pública. - Impacto de medidas de ahorro y medidas de ingresos previstas y calendario previsto de impacto en presupuesto. - Vencimientos mensuales de deuda a corto y largo plazo. - Calendario y cuantías de necesidades de endeudamiento. - Evolución del salgo de las obligaciones reconocidas pendientes de pago tanto del ejercicio corriente como de los años anteriores.  - Perfil de vencimientos de la deuda de los próximos diez años. '),
            array('Obligaciones trimestrales de suministro de información', '31/12', 'Le recordamos que en cumplimiento del artículo 16.9  de la Orden HAP/2105/2012 debe remitir al Ministerio la información relativa al personal de las entidades: - Órganos estatutarios. - Retribuciones básicas, complementarias, acción social, aportaciones a planes de pensiones, cotizaciones al sistema de seguridad social a cargo del empleador e indemnizaciones. - Efectivos por clases de personal, incluyendo altos cargos. - Dotaciones o plantillas presupuestarias de personal, con el desglose orgánico.        Se remitirá información sobre los efectivos de personal: - Número de efectivos y clases de personal. - Todas las retribuciones diferenciando básicas de complementarias asignadas al personal. - El número de efectivos por modalidades de jornada.')
        );

        foreach ($obligaciones_municipal as $o) {
            $titulo = $o[0];
            $array_fecha = explode("/", $o[1]);
            $dia = $array_fecha[0];
            $mes = $array_fecha[1];
            $texto = $o[2];

            $fecha = new \DateTime();
            $fecha->setDate('2014', $mes, $dia);
            $fecha->setTime(23, 59, 59);

            $obligacion = new Obligacion();

            $obligacion->setNombre($titulo);
            $obligacion->setTexto($texto);
            $obligacion->setFechaExpiracion($fecha);
            $obligacion->setLista($listas[0]);

            $manager->persist($obligacion);
        }
        
        $manager->flush();

        for ($i = 1; $i <= 10; $i++) {
            $usuario = new Usuario();
            $usuario->setNombre('N_usuario' . $i);
            $usuario->setApellidos('Apellido_A' . $i . ' Apellido_B' . $i);
            $usuario->setEntidad('Entidad_' . $i);
            $usuario->setEmail('mail_' . $i . '@servidor.com');
            $usuario->setPassword('contra_00' . $i);
            $usuario->setSalt(uniqid(''));
            $usuario->setFechaAlta(new \DateTime('now'));

            $manager->persist($usuario);
        }
        
        $manager->flush();
        
        $usuarios = $manager->getRepository('UsuarioBundle:Usuario')->findAll();
    

        $obligaciones = $manager->getRepository('ObligacionBundle:Obligacion')->findAll();


        foreach ($usuarios as $u) {


            foreach ($obligaciones as $o) {
                $sm = clone $o->getFechaExpiracion();
                $sm->sub(new \DateInterval('P7D'));
                
                $h48 = clone $o->getFechaExpiracion();
                $h48->sub(new \DateInterval('P2D'));
                
                $h24 = clone $o->getFechaExpiracion();
                $h24->sub(new \DateInterval('P1D'));
                
                
                $avisos = array($sm,$h48,$h24);
                
                

                foreach ($avisos as $av) {
                    $alerta = new Alerta();
                    $alerta->setUsuario($u);
                    $alerta->setObligacion($o);
                    $alerta->setFechaEnvio($av);
                    $alerta->setCumplida(false);
                    $alerta->setEnviada(false);

                    $manager->persist($alerta);
                }
            }
        }

        $manager->flush();
    }

}
