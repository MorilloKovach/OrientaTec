-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-10-2025 a las 10:53:28
-- Versión del servidor: 8.0.43
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c2661773_orienta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--
CREATE DATABASE c2661773_orienta;

use c2661773_orienta;

CREATE TABLE `especialidades` (
  `especialidad_id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `NombreCorto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `PlanDeEstudios` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `VistaPrevia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `PerfilProfesional` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`especialidad_id`, `nombre`, `NombreCorto`, `PlanDeEstudios`, `VistaPrevia`, `PerfilProfesional`) VALUES
(1, 'Técnico en Electromecánica ', 'Electromecánica', './planes/electromecanica.pdf', './planestudioprevio/electromecanica.jpg', ' <p><b>El Técnico del sector Electromecánico</b> está capacitado para manifestar conocimientos, habilidades,\r\n        destrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de\r\n        profesionalidad propios de su área y de responsabilidad social al:\r\n        \"Proyectar equipos e instalaciones mecánicas, electromecánicas, de sistemas neumáticos,\r\n        oleohidraúlicos; circuitos eléctricos y de control de automatismos; herramientas y\r\n        dispositivos”.\r\n    </p>\r\n    <ul>\r\n        <li>“Realizar ensayos de materiales y ensayos eléctricos, mecánicos, y electromecánicos”</li>.\r\n\r\n        <li>“Operar equipos e instalaciones y dispositivos de accionamiento y control de la\r\n        producción y máquinas herramientas”.</li>\r\n\r\n        <li>“Realizar los mantenimientos, predictivo, preventivo, funcional operativo, y correctivo de\r\n        componentes, equipos e instalaciones electromecánicas”.</li>\r\n\r\n        <li>“Montar dispositivos y componentes de equipos e instalaciones mecánicas eléctricas, de\r\n        sistemas neumáticos, oleohidraúlicos y electromecánicas”</li>\r\n\r\n        <li>“Instalar líneas de consumo y distribución de energía eléctrica de baja y media tensión”.</li>\r\n\r\n        <li>“Realizar la selección, asesoramiento y comercialización de equipamiento e instalaciones\r\n        electromecánicas”.</li>\r\n\r\n        <li>“Generar emprendimientos”.</li>\r\n    </ul>\r\n    \r\n    <p>Cada uno de estos puntos en los ámbitos de producción, laboratorios, mantenimiento, desarrollo,\r\n    gestión y comercialización, actuando en relación de dependencia o en forma independiente. Será\r\n    capaz de interpretar las definiciones estratégicas surgidas de los estamentos técnicos y jerárquicos\r\n    pertinentes, gestionar sus actividades específicas, realizar y controlar la totalidad de las\r\n    actividades requeridas hasta su efectiva concreción, teniendo en cuenta los criterios de seguridad,\r\n    impacto ambiental, relaciones humanas, calidad y productividad.</p>\r\n'),
(2, 'Técnico en Administración de las Organizaciones ', 'Administración', './planes/administracion.pdf', './planestudioprevio/administracionorganizaciones.jpg', '<p><b>El Técnico en administración de las organizaciones</b> está capacitado para desarrollar las\r\ncompetencias generales y específicas que se describen en el actual documento,\r\ndesarrollando las siguientes actividades:</p>\r\n<ul>\r\n<li>operar en los procesos administrativos básicos en ámbitos de organizaciones\r\nproductoras y/o comercializadoras de Bienes y Servicios.</li>\r\n<li> Ejecutar, tramitar operaciones bancarias y de gestoría.</li>\r\n<li> Asistir en cuestiones administrativas a los niveles gerenciales.</li>\r\n<li>Operar eficazmente en la administración de bienes y servicios.</li>\r\n<li> Diseñar, ejecutar, controlar las funciones básicas de comercialización,\r\nproducción, financiera y de RRHH en una organización</li>\r\n<li> Coordinar acciones de gestión dentro y fuera de la empresa ayudando a\r\nejecutar y controlar el planeamiento de la misma.</li>\r\n<li> Practicar en equipos técnicos interdisciplinarios para realizar análisis,\r\ndiagnóstico, estudio del mercado, etc.</li>\r\n</ul>\r\n<p>Desarrollando las demás actividades descriptas en su perfil profesional y pudiendo\r\nactuar de nexo entre los diferentes niveles que existen en las organizaciones.\r\nEstas competencias serán desarrolladas según las incumbencias y las normas técnicas\r\ny legales que rigen su campo profesional.</p>'),
(3, 'Técnico Químico', 'Química', './planes/química.pdf', './planestudioprevio/quimico.jpg', '<p><b>El Técnico del sector químico</b> está capacitado para manifestar conocimientos, habilidades,\r\ndestrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de\r\nprofesionalidad propios de su área y de responsabilidad social al:</p>\r\n<ul>\r\n<li>Evaluar las demandas de los análisis planteados, interpretar adecuadamente\r\nel tipo de requerimiento y planificar las acciones corresp ondientes que permitan\r\nsu resolución</li>\r\n<li>Elaborar los cursos de acción adecuados para encarar la ejecución de las\r\ntareas planificadas.</li>\r\n<li>Gestionar y administrar el funcionamiento del ámbito de trabajo, las\r\nrelaciones interpersonales y la provisión de los recursos</li>\r\n<li>Realizar análisis de ensayos e interpretar sus resultados</li>\r\n<li>Supervisar la ejecución de ensayos y análisis y la adecuación de los\r\nprocedimientos a normas de calidad, seguridad y manejo adecuado de residuos.</li>\r\n<li>Generar y/o participar de emprendimientos vinculados con áreas de su profesionalidad</li>\r\n<li>Operar y plantear mejoras en procesos químicos, físicos, fisicoquímicos y microbiológicos</li>\r\n</ul>\r\n<p>Cada uno de estos puntos en los ámbitos de producción, laboratorios, mantenimiento,\r\ndesarrollo, gestión y comercialización, actuando en relación de dependencia o en forma\r\nindependiente. Será capaz de interpretar las definiciones estratégicas surgidas de los\r\nestamentos técnicos y jerárquicos pertinentes, gestionar sus actividades específicas, realizar\r\ny controlar la totalidad de las actividades requeridas hasta su efectiva concreción, teniendo\r\nen cuenta los criterios de seguridad, impacto ambiental, relaciones humanas, calidad y\r\nproductividad.</p>'),
(4, 'Técnico en Tecnología de los Alimentos', 'Alimentos', './planes/alimentos.pdf', './planestudioprevio/tecnologiaalimentos.jpg', '<p><b>El Técnico en Tecnología de los Alimentos</b> está capacitado para manifestar conocimientos,\r\nhabilidades, destrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios\r\nde profesionalidad propios de su área y de responsabilidad social al:</p>\r\n<ul>\r\n<li>Organizar y controlar la recepción, almacenamiento y expedición de materia prima, insumos\r\ny/o productos terminados de la industria alimentaria.</li>\r\n<li>Operar, controlar los parámetros de proceso en las distintas líneas de producción y en los\r\nequipos a través de los instrumentos existentes de la industria alimentaria.</li>\r\n<li>Realizar e interpretar análisis y ensayos organolépticos, físicos, químicos, fisicoquímicos y\r\nmicrobiológicos de materias primas, insumos, materiales en proceso, y productos alimenticios\r\nde origen animal, vegetal, mineral y/o artificial, efluentes y emisiones al medio ambiente.</li>\r\n<li>Organizar y gestionar las actividades de laboratorio, de los distintos procesos de producción\r\ny/o del desarrollo de nuevos productos, conformes a las normas de higiene, seguridad y\r\nambiente en el procesamiento de los alimentos.</li>\r\n<li>Generar y/o participar en emprendimientos vinculados con áreas de su profesionalidad.</li>\r\n<li>Aplicar y controlar la ejecución de normas de higiene y seguridad, ambientales, inocuidad,\r\ninspección e integridad a fin de alcanzar los estándares definidos en la producción y\r\ncomercialización de los distintos tipos de alimentos.</li>\r\n</ul>\r\n\r\n\r\n<p>Cada uno de estos alcances se llevan a cabo en los ámbitos de producción, laboratorios,\r\nmantenimiento, desarrollo, gestión y comercialización; teniendo en cuenta criterios de\r\nseguridad, impacto ambiental, relaciones humanas, calidad y productividad; identificando,\r\ndocumentando, manteniendo y revisando los riesgos alimenticios que ocurran durante el\r\nproceso de producción; según las definiciones estratégicas surgidas de los estamentos técnicos\r\ny jerárquicos pertinentes con autonomía y responsabilidad sobre su propia labor y la de otros a\r\nsu cargo.</p>'),
(5, 'Técnico en Electrónica', 'Electrónica', './planes/electronica.pdf', './planestudioprevio/electro.jpg', '<p> <b>El Técnico en Electrónica</b> está capacitado para manifestar conocimientos, habilidades, destrezas, valores y\r\nactitudes en situaciones reales de trabajo, conforme a criterios de profesionalidad propios de su área y\r\nresponsabilidad social, al: </p>\r\n<ul>\r\n    <li>Proyectar, componentes y equipos de electrónica analógica y/o digital, con tecnología\r\nelectrónica estándar y de baja o mediana complejidad”lectrónicas en dispositivos, componentes, equipos e\r\ninstalaciones con electrónica analógica y/o digital, estándar de baja o mediana complejidad.</li>\r\n    <li>Operar componentes, productos y equipos con electrónica analógica y/o digital.</li>\r\n    <li>Realizar los mantenimientos, predictivo, preventivo, funcional operativo, y correctivo de\r\ncomponentes, productos y equipos con electrónica estándar, analógica y/o digital, de baja o\r\nmediana complejidad.</li>\r\n    <li>Montar dispositivos y componentes con electrónica analógica y/o digital, estándar de baja o\r\nmediana complejidad</li>\r\n    <li>Instalar productos y equipos con electrónica analógica y/o digital.</li>\r\n    <li>Realizar la selección, asesoramiento y comercialización de dispositivos, componentes, productos\r\ny equipos con electrónica analógica y/o digital, estándar de baja o mediana complejidad.</li>\r\n    <li>Generar emprendimientos con electrónica analógica y/o digital de baja o mediana complejida.\r\n</li>\r\n</ul>\r\n\r\n\r\n<p>Cada uno de estos alcances particulares sobre la electrónica de los equipos, componentes,\r\nproductos e instalaciones; en los ámbitos de control, telecomunicaciones, instrumentos, o\r\nelectrónica industrial; tendrán en cuenta criterios de seguridad, cuidado del ambiente, ergonomía,\r\ncalidad, productividad, y costos; según las definiciones estratégicas surgidas de los estamentos\r\ntécnicos y jerárquicos correspondientes con autonomía y responsabilidad sobre su propio trabajo y\r\nsobre el trabajo de otros a su cargo.</p>'),
(6, 'Técnico en Informática Personal y Profesional', 'Informática', './planes/info.pdf', './planestudioprevio/info.jpg', '<p><b>El Técnico en Informática Profesional y Personal</b> está capacitado para asistir al usuario de\r\nproductos y servicios informáticos brindándole servicios de instalación, capacitación,\r\nsistematización, mantenimiento primario, resolución de problemas derivados de la operatoria,\r\ny apoyo a la contratación de productos o servicios informáticos, desarrollando las actividades\r\ndescriptas en su perfil profesional y pudiendo actuar de nexo entre el especialista o experto en\r\nel tema, producto o servicio y el usuario final.\r\nSus actividades profesionales cubren las siguientes áreas:</p>\r\n<ul>\r\n    <li>Facilitar la operatoria del usuario,\r\nAyudando a organizar sus archivos y dando apoyo para resolver problemas que habitualmente\r\nse le presentan y que, por falta de tiempo o conocimientos, están fuera de su alcance. Capacitar\r\ny asesorar al usuario en la operación y aprovechamiento de la funcionalidad de los equipos y\r\nprogramas y formas de eliminar problemas operativos.</li>\r\n    <li>Mantener la integridad de los datos locales del usuario,” protegiéndolos mediante el\r\nresguardo preventivo de los mismos, ejecutar acciones anti-virus, incluyendo reparaciones de\r\narchivos afectados. Asegurar la eficiencia de su acceso a través de su reorganización física y\r\nlógica.</li>\r\n    <li>Instalar y poner en marcha componentes o sistemas, equipos y redes,\r\npor entrega de nuevas versiones o ampliación de capacidades, revisando configuraciones y\r\nresolviendo problemas emergentes de la integración de los nuevos componentes con los ya\r\nexistentes.</li>\r\n    <li>Mantener equipos y sistemas de baja complejidad o componentes de los mismos\r\nAbarca, entre otros, el diagnóstico de fallos y el mantenimiento preventivo o primario de\r\ncomponentes físicos y lógicos de computación y comunicación.</li>\r\n    <li>Optimizar el ambiente informático de trabajo del usuario,\r\nDesarrollar programas, o adaptar y complementar sus funcionalidades, utilizando las\r\nherramientas puestas a disposición de los usuarios por los realizadores de los sistemas.</li>\r\n    <li>Asesorar y apoyar en la compra y en la venta de productos o servicios informáticos.Armado de equipos. Para ello efectúa el relevamiento de requerimientos, identificación de\r\nproductos, ubicación de fuentes de aprovisionamiento, comparación de precios, presupuestos y\r\nespecificaciones técnicas.</li>\r\n    <li>Autogestionar sus actividades,\r\nLas de su sector dentro de la organización, o emprendimiento propio, para lo cual planifica el\r\nempleo de tiempo, administran actividades, cumple acciones de capacitación y entrenamiento\r\npara mantenerse actualizado respecto del estado del arte en su profesión y mantiene registros\r\nde lo actuado acordes a su ámbito de desempeño.</li>\r\n\r\n</ul>\r\n\r\n\r\n<p>Este técnico se desempeña en estrecha relación con el usuario, por lo general trabajando en\r\nforma individual, sin supervisión directa y sus desempeños están dedicados no sólo a instalar\r\nequipos, software y componentes de sistemas de computación y redes, sino también a\r\nsolucionar problemas operativos relativamente puntuales, tanto de hardware y conectividad\r\ncomo de software, que se le suelen presentar al usuario en el ámbito de la informática\r\nprofesional y personal.</p>\r\n\r\n<p>Con referencia a esto último, resulta de capital importancia que el técnico sea capaz de realizar\r\nun diagnóstico de posibles fallas que afecten a la operatoria del usuario o al funcionamiento del\r\nhardware o software que esté instalando, las que en muchos casos pueden deberse\r\nlimitaciones, incompatibilidades o a problemas de configuración del sistema, en un lapso que\r\nresulte aceptable para el usuario y sin afectar sus datos, programas u operatoria.</p>'),
(7, 'Maestro Mayor de Obras', 'Maestro_Mayor_de_Obras', './planes/maestromayordeobra.pdf', './planestudioprevio/mmobra.jpg', '<p><b>El Maestro Mayor de Obras</b> está capacitado para manifestar conocimientos, habilidades,\r\ndestrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de\r\nprofesionalidad propios de su área y de responsabilidad social al:</p>\r\n<ul>\r\n\r\n<li>Analizar las necesidades de un cliente y elaborar el programa de necesidades</li>\r\n<li>Elaborar anteproyectos de soluciones espaciales edilicias constructivas y técnicas para un\r\nprograma de necesidades determinado”</li>\r\n<li>“Proyectar soluciones espaciales edilicias, constructivas y técnicas para un anteproyecto\r\ndeterminado”</li>\r\n<li>“Dirigir la ejecución de procesos constructivos en genera.”</li>\r\n<li>“Gestionar y administrar la ejecución del proceso constructivo en general”\r\n“Prestar servicios de evaluación técnica a terceros”</li>\r\n<li>“Asesorar técnicamente a terceros” </li>\r\n\r\n\r\n</ul>'),
(8, 'Técnico en Aeronáutica', 'Aeronáutica', './planes/aeronautico.pdf', './planestudioprevio/aeronautica.jpg', '<p>\r\n<b>El Técnico aeronáutico</b> está capacitado para manifestar conocimientos, habilidades,\r\ndestrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de\r\nprofesionalidad propios de su área y de responsabilidad social2 al: </p>\r\n<ul>\r\n    <li>Proyectar, diseñar y calcular aeronaves.</li>\r\n    <li>Asesorar en la selección de una aeronave adecuada a los requerimientos del cliente.\r\n</li>\r\n    <li>Proyectar, diseñar y calcular sistemas, componentes y partes aeronáuticas.\r\n</li>\r\n    <li>Operar y mantener sistemas, componentes y partes aeronáuticas.\r\n</li>\r\n    <li>Ensayar y evaluar sistemas, componentes y partes aeronáuticas.\r\n</li>\r\n    <li>Seleccionar, asesorar y comercializar sistemas, equipos y partes aeronáuticas.\r\n</li>\r\n\r\n</ul>\r\n\r\n<p>\r\nCada uno de estos puntos en los ámbitos de producción, laboratorios, mantenimiento,\r\ndesarrollo, gestión y comercialización, actuando en relación de dependencia o en forma\r\nindependiente. Será capaz de interpretar las definiciones estratégicas surgidas de los\r\nestamentos técnicos y jerárquicos pertinentes, gestionar sus actividades específicas, realizar\r\ny controlar la totalidad de las actividades requeridas hasta su efectiva concreción, teniendo\r\nen cuenta los criterios de seguridad, impacto ambiental, relaciones humanas, calidad y\r\nproductividad.\r\n</p>'),
(9, 'Técnico Aviónico', 'Aviónico', './planes/avionica.pdf', './planestudioprevio/avionico.jpg', '<p>\r\n<b>El Técnico Aviónico</b> está capacitado para manifestar conocimientos, habilidades, destrezas,\r\nvalores y actitudes en situaciones reales de trabajo, conforme a criterios de profesionalidad\r\npropios de su área y de responsabilidad social al: </p>\r\n<ul>\r\n    <li>Proyectar, diseñar y calcular sistemas, dispositivos y componentes de aviónica, de\r\nelectrónica convencional y comunicaciones.</li>\r\n    <li>Instalar sistemas, dispositivos y componentes de aviónica, de electrónica convencional y\r\ncomunicaciones.</li>\r\n    <li>Mantener y operar sistemas, dispositivos y componentes de aviónica, de electrónica\r\nconvencional y comunicaciones.</li>\r\n    <li>Ensayar y evaluar sistemas, dispositivos y componentes de aviónica, de electrónica\r\nconvencional y comunicaciones.</li>\r\n    <li>Asesorar, seleccionar, y comercializar sistemas, dispositivos, componentes de aviónica y de\r\nelectrónica analógica y digital, telecomunicaciones, instrumental, equipo y/o parte\r\naeronáutica referida a su especialidad.</li>\r\n    <li>Generar y/o participar de emprendimientos.</li>\r\n\r\n\r\n\r\n\r\n\r\n\r\n</ul>'),
(10, 'Técnico en Automotores', 'Automotores', './planes/automotores.pdf', './planestudioprevio/automotores.jpg', '<p><b>El Técnico en Automotores</b> está capacitado para manifestar conocimientos, habilidades,\r\ndestrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de\r\nprofesionalidad propios de su área y de responsabilidad social al:</p>\r\n\r\n<ul>\r\n    <li>“Proyectar, diseñar y calcular componentes, sistemas e instalaciones del automotor”\r\n</li>\r\n    <li>“Montar y desmontar componentes, sistemas e instalaciones del automotor”\r\n</li>\r\n    <li>“Verificar y evaluar componentes, sistemas e instalaciones de automotores”\r\n</li>\r\n    <li>“Operar y mantener componentes, sistemas e instalaciones del automotor”\r\n</li>\r\n    <li>“Realizar e interpretar ensayos de motores, sistemas e instalaciones del automotor”\r\n</li>\r\n    <li>“Comercializar, seleccionar y asesorar en servicios y productos del área automotriz”\r\n</li>\r\n    <li>“Generar emprendimientos”\r\n</li>\r\n</ul>\r\n\r\n<p>Cada uno de estos puntos en los ámbitos de producción, de servicios, mantenimiento,\r\nreparación de componentes, comercialización, asesoramiento, verificación, proyecto,\r\nensayo, y gestión de emprendimientos, actuando en relación de dependencia o en forma\r\nindependiente. Será capaz de interpretar las definiciones estratégicas surgidas de los\r\nestamentos técnicos y jerárquicos pertinentes, gestionar sus actividades específicas, realizar\r\ny controlar la totalidad de las actividades requeridas hasta su efectiva concreción, teniendo\r\nen cuenta los criterios de seguridad, impacto ambiental, relaciones humanas, calidad y\r\nproductividad.</p>'),
(11, 'Técnico en Servicios Turísticos', 'Turismo', './planes/turístico.pdf', './planestudioprevio/turismo.jpg', '<p><b>El Técnico en Servicios Turísticos</b> está capacitado para manifestar conocimientos, habilidades, destrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de profesionalidad propios de su área y de responsabilidad social al:</p>\r\n\r\n    <ul>\r\n        <li>Diseñar, organizar y coordinar servicios y actividades turísticas.</li>\r\n        <li>Asesorar a turistas y clientes en la elección de destinos, servicios y productos del sector.</li>\r\n        <li>Planificar y gestionar programas, circuitos y paquetes turísticos.</li>\r\n        <li>Promocionar y comercializar destinos y servicios turísticos en distintos ámbitos.</li>\r\n        <li>Operar y administrar sistemas de reservas y gestión turística.</li>\r\n        <li>Guiar y acompañar grupos en actividades turísticas y recreativas.</li>\r\n        <li>Aplicar técnicas de comunicación, atención al cliente y hospitalidad.</li>\r\n        <li>Generar emprendimientos vinculados al turismo y la recreación.</li>\r\n    </ul>\r\n\r\n    <p>Cada uno de estos puntos en los ámbitos de:</p>\r\n\r\n    <ul>\r\n        <li>Agencias de viajes</li>\r\n        <li>Transporte</li>\r\n        <li>Hotelería</li>\r\n        <li>Gastronomía</li>\r\n        <li>Recreación</li>\r\n        <li>Promoción cultural y turística</li>\r\n        <li>Asesoramiento y gestión de emprendimientos</li>\r\n    </ul>\r\n\r\n    <p>Actuando en relación de dependencia o en forma independiente.</p>\r\n\r\n    <p>Será capaz de interpretar las definiciones estratégicas surgidas de los estamentos técnicos y jerárquicos pertinentes, gestionar sus actividades específicas, realizar y controlar la totalidad de las actividades requeridas hasta su efectiva concreción, teniendo en cuenta los criterios de:</p>\r\n\r\n    <ul>\r\n        <li>Sustentabilidad</li>\r\n        <li>Impacto ambiental</li>\r\n        <li>Seguridad</li>\r\n        <li>Relaciones humanas</li>\r\n        <li>Calidad</li>\r\n        <li>Accesibilidad</li>\r\n        <li>Inclusión</li>\r\n    </ul>'),
(12, 'Técnico en Multimedios', 'Multimedios', './planes/multimedios.pdf', './planestudioprevio/multimedio.jpg', '<p><b>El Técnico en Multimedios</b> está capacitado para manifestar conocimientos, habilidades, destrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de profesionalidad propios de su área y de responsabilidad social al:</p> <ul> <li>Diseñar, producir y editar contenidos audiovisuales, gráficos, interactivos y sonoros.</li> <li>Operar, instalar y mantener equipos y sistemas multimediales.</li> <li>Integrar recursos tecnológicos en proyectos de comunicación, educación, publicidad y entretenimiento.</li> <li>Planificar y desarrollar proyectos multimediales, combinando creatividad y criterios técnicos.</li> <li>Aplicar técnicas de animación, diseño digital, programación y postproducción.</li> <li>Gestionar y administrar plataformas y entornos digitales para la difusión de contenidos.</li> <li>Asesorar en la selección, uso y aplicación de tecnologías multimediales.</li> <li>Generar emprendimientos en el ámbito de la comunicación digital y multimedial.</li> </ul> <p>Cada uno de estos puntos se desarrolla en los ámbitos de producción, servicios, mantenimiento de equipos, desarrollo de proyectos, comunicación institucional, comercialización, asesoramiento, capacitación y gestión de emprendimientos, actuando en relación de dependencia o en forma independiente.</p> <p>Será capaz de interpretar las definiciones estratégicas surgidas de los estamentos técnicos y jerárquicos pertinentes, gestionar sus actividades específicas, realizar y controlar la totalidad de las actividades requeridas hasta su efectiva concreción, teniendo en cuenta los criterios de seguridad, impacto ambiental, accesibilidad, relaciones humanas, innovación, calidad y productividad.</p>'),
(13, 'Técnico Constructor Naval', 'Constructor Naval', './planes/naval.pdf', './planestudioprevio/naval.jpg', '<p><b>El Técnico Constructor Naval</b> está capacitado para manifestar conocimientos, habilidades, destrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de profesionalidad propios de su área y de responsabilidad social al:</p> <ul> <li>Proyectar, diseñar y calcular estructuras, componentes y sistemas navales.</li> <li>Construir, montar y ensamblar embarcaciones, partes y equipos auxiliares.</li> <li>Operar, mantener y reparar sistemas estructurales y de propulsión de embarcaciones.</li> <li>Verificar, evaluar y controlar la calidad de materiales, procesos y productos navales.</li> <li>Aplicar técnicas de soldadura, mecanizado, carpintería naval y montaje de sistemas.</li> <li>Interpretar planos, normas técnicas y reglamentaciones específicas del sector naval.</li> <li>Asesorar en la selección de materiales, tecnologías y procesos para la construcción y reparación naval.</li> <li>Generar y gestionar emprendimientos en el ámbito de la construcción y mantenimiento de embarcaciones.</li> </ul> <p>Cada uno de estos puntos se desarrolla en los ámbitos de astilleros, talleres navales, empresas de mantenimiento y reparación, organismos de control, actividades de producción, servicios, comercialización, asesoramiento, verificación y gestión de emprendimientos, actuando en relación de dependencia o en forma independiente.</p> <p>Será capaz de interpretar las definiciones estratégicas surgidas de los estamentos técnicos y jerárquicos pertinentes, gestionar sus actividades específicas, realizar y controlar la totalidad de las actividades requeridas hasta su efectiva concreción, teniendo en cuenta los criterios de seguridad, normativas internacionales, impacto ambiental, eficiencia energética, innovación tecnológica, calidad y productividad.</p>'),
(14, 'Técnico en Programación', 'Programación', './planes/programacion.pdf', './planestudioprevio/programacion.jpg', '<p><b>El Técnico en Programación</b> estará capacitado para:</p> <ul> <li>Realizar programas o componentes de sistemas de computación.</li> <li>Interpretar especificaciones de diseño.</li> <li>Documentar los productos realizados.</li> <li>Verificar los componentes programados.</li> <li>Buscar causas de malfuncionamiento y corregir los programas.</li> <li>Adaptar los programas a cambios en las especificaciones.</li> </ul> <p>Desarrollará estas actividades en el marco de un equipo de trabajo organizado por proyecto, cumpliendo con los criterios de realización establecidos en el perfil profesional.</p> <p>Este Técnico en Programación participa en proyectos de desarrollo de software, desempeñando roles cuyo objetivo es producir programas, módulos o componentes de sistemas de computación. Estos módulos suelen integrarse en aplicaciones que interactúan con otras ya existentes, desarrolladas con la misma o con diferentes tecnologías.</p>'),
(15, 'Técnico en Mecánica', 'Mecánica', './planes/mecanica.pdf', './planestudioprevio/mecanica.jpg', '<p><b>El Técnico en Mecánica</b> estará capacitado para manifestar conocimientos, habilidades, destrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de profesionalidad propias de su área ocupacional y de responsabilidad social al:</p> <ul> <li>\"Diseñar, proyectar y construir elementos, dispositivos, equipos e instalaciones mecánicas de baja y mediana complejidad.\"</li> <li>\"Efectuar el proyecto y montaje de las instalaciones de servicios para cumplir en tiempo y forma con los requerimientos del proceso productivo.\"</li> <li>\"Montar e instalar elementos, dispositivos, equipamiento, artefactos e instalaciones mecánicas.\"</li> <li>\"Operar elementos, dispositivos y equipamiento mecánico.\"</li> <li>\"Programar y realizar el mantenimiento de sistemas de equipamiento mecánico.\"</li> <li>\"Prestar servicio de consultoría y de asesoramiento técnico, en la selección, adquisición y montaje de elementos y dispositivos mecánicos.\"</li> <li>\"Gestionar y supervisar las existencias de stocks de materia prima, insumos y servicios.\"</li> <li>\"Realizar prestación de servicio de logística para la comercialización.\"</li> <li>\"Efectuar ensayos de materiales y de comprobación de propiedades físicas y mecánicas en elementos, dispositivos y equipamiento mecánico.\"</li> <li>\"Asesorar, gestionar y/o generar nuevos emprendimientos vinculados con el área de desempeño correspondiente a su profesionalidad.\"</li> </ul> <p>Cada una de estas capacidades se desarrolla en los ámbitos de diseño industrial; mantenimiento industrial y de infraestructura edilicia; gestión de stocks y de comercialización; laboratorios de ensayos; operación de componentes, equipamiento, instalaciones y/o sistemas auxiliares industriales destinados a iluminación, señalización, comunicaciones, fuerza motriz, generación y transformación de energía, saneamiento, prevención y control de incendio, transporte de productos y/o personas, conducción de fluidos y producción de bienes y servicios.</p> <p>Desempeñará sus funciones teniendo en cuenta criterios de seguridad, cuidado del medio ambiente, ergonomía, calidad, productividad y costos, según las definiciones técnicas surgidas de los estamentos técnicos y jerárquicos correspondientes, con autonomía y responsabilidad sobre su propio trabajo y sobre el trabajo de otros a su cargo.</p>'),
(16, 'Técnico en Energías Renovables', 'Energias', './planes/energia.pdf', './planestudioprevio/energiasrenovables.png', '\r\n  <p>\r\n    <b>El Técnico en Energías Renovables</b> estará capacitado para manifestar conocimientos, habilidades,\r\n    destrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de\r\n    profesionalidad propios de su área ocupacional y de responsabilidad social al:\r\n  </p>\r\n\r\n  <ul>\r\n    <li>\"Analizar recursos energéticos renovables (radiación solar, viento, biomasa, pequeños cursos de agua) y determinar su potencial para proyectos locales.\"</li>\r\n    <li>\"Diseñar, dimensionar y proyectar sistemas fotovoltaicos, eólicos y/o híbridos de baja y mediana potencia.\"</li>\r\n    <li>\"Instalar y poner en servicio sistemas y componentes de generación renovable (paneles, inversores, aerogeneradores, bancos de baterías, sistemas de control).\"</li>\r\n    <li>\"Realizar mediciones e instrumentación para el relevamiento de recurso energético y para el monitoreo del desempeño de las instalaciones.\"</li>\r\n    <li>\"Programar, configurar y operar equipos de control y automatización aplicados a centrales y microredes (PLC, inversores con MPPT, sistemas SCADA básicos).\"</li>\r\n    <li>\"Ejecutar planes de mantenimiento preventivo y correctivo en instalaciones de energías renovables, garantizando disponibilidad y seguridad operativa.\"</li>\r\n    <li>\"Evaluar la viabilidad técnico–económica y ambiental de proyectos energéticos, elaborando presupuestos, balances energéticos y análisis de retorno de inversión.\"</li>\r\n    <li>\"Asesorar en la selección de tecnologías y componentes, normativas y buenas prácticas para la integración segura de renovables en redes y en instalaciones aisladas.\"</li>\r\n    <li>\"Gestionar emprendimientos y proyectos locales vinculados a la generación distribuida, eficiencia energética y servicios energéticos (ESCOs).\"</li>\r\n    <li>\"Implementar medidas de gestión energética y auditorías para optimizar el uso racional de la energía en edificios, industrias y comunidades.\"</li>\r\n  </ul>\r\n\r\n  <p>\r\n    Cada una de estas capacidades se desarrolla en los ámbitos de diseño y proyecto; montaje y puesta\r\n    en marcha; operación y mantenimiento; laboratorio y mediciones de recurso; gestión y evaluación\r\n    económica de proyectos; y atención técnica a usuarios y comunidades. Los egresados podrán\r\n    desempeñarse en empresas instaladoras, cooperativas, consultoras energéticas, empresas de servicios\r\n    energéticos, municipios, industrias y organizaciones no gubernamentales que desarrollen proyectos\r\n    de generación distribuida y eficiencia energética.\r\n  </p>\r\n\r\n  <p>\r\n    Desempeñará sus funciones teniendo en cuenta criterios de seguridad eléctrica y laboral, cuidado\r\n    del medio ambiente, evaluación de riesgos, normas de calidad, eficiencia y costos, respetando las\r\n    regulaciones técnicas y ambientales vigentes. Actuará con autonomía y responsabilidad sobre su\r\n    propio trabajo y podrá coordinar equipos técnicos en obras e instalaciones, promoviendo prácticas\r\n    sostenibles y la transferencia de conocimientos a la comunidad.\r\n  </p>'),
(17, 'Técnico en Electricidad', 'Electricidad', './planes/electricidad.pdf', './planestudioprevio/electricidad.png', '<p><b>El Técnico en Electricidad</b> estará capacitado para manifestar conocimientos, habilidades, destrezas, valores y actitudes en situaciones reales de trabajo, conforme a criterios de profesionalidad propias de su área ocupacional y de responsabilidad social al:</p>\r\n<ul>\r\n  <li>\"Diseñar, proyectar y construir instalaciones eléctricas de baja, media y alta tensión, así como sistemas de control y automatización.\"</li>\r\n  <li>\"Efectuar el montaje, conexión y puesta en marcha de equipos, artefactos e instalaciones eléctricas según normas de seguridad.\"</li>\r\n  <li>\"Operar, mantener y reparar sistemas eléctricos, motores, transformadores, tableros y circuitos eléctricos.\"</li>\r\n  <li>\"Programar y supervisar sistemas de control eléctrico y automatización industrial.\"</li>\r\n  <li>\"Prestar asesoramiento técnico en la selección, adquisición y montaje de componentes eléctricos y electrónicos.\"</li>\r\n  <li>\"Gestionar y supervisar el stock de materiales, repuestos y equipos eléctricos.\"</li>\r\n  <li>\"Realizar mediciones, ensayos y verificaciones de instalaciones y equipos eléctricos, asegurando el cumplimiento de normas y estándares.\"</li>\r\n  <li>\"Asesorar, gestionar y/o generar nuevos emprendimientos vinculados con el área eléctrica y de energía.\"</li>\r\n</ul>\r\n<p>Cada una de estas capacidades se desarrolla en los ámbitos de diseño y mantenimiento de instalaciones eléctricas residenciales, comerciales e industriales; operación de sistemas de distribución, iluminación, señalización y energía; gestión de materiales y equipos eléctricos; laboratorios de ensayos y mediciones; automatización y control industrial.</p>\r\n<p>Desempeñará sus funciones teniendo en cuenta criterios de seguridad eléctrica, cuidado del medio ambiente, ergonomía, calidad, productividad y costos, según las definiciones técnicas surgidas de los estamentos técnicos y jerárquicos correspondientes, con autonomía y responsabilidad sobre su propio trabajo y sobre el trabajo de otros a su cargo.</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `establecimiento_id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `clave` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cue_anexo` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modalidad` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nivel` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_general_ci,
  `telefono` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sitio_web` text COLLATE utf8mb4_general_ci,
  `cui` bigint DEFAULT NULL,
  `cue` int DEFAULT NULL,
  `nro_escuela` int DEFAULT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `localidad_id` int DEFAULT NULL,
  `UsuarioID` int NOT NULL,
  `Usuario` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Contraseña` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `ImagenEscuela` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT './assets/escueladefecto.jpg',
  `NombreCorto` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_map` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`establecimiento_id`, `nombre`, `clave`, `cue_anexo`, `modalidad`, `nivel`, `direccion`, `telefono`, `email`, `sitio_web`, `cui`, `cue`, `nro_escuela`, `latitud`, `longitud`, `localidad_id`, `UsuarioID`, `Usuario`, `Contraseña`, `ImagenEscuela`, `NombreCorto`, `google_map`) VALUES
(0, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA N°14', '', '60866400', 'Educación Técnico Profesional', 'Nivel Secundario', 'BARILOCHE ESQ. GARZON - 6615', '2202-42-8307', 'eest14lamatanza@abc.gob.ar', 'https://www.facebook.com/tecnica.catorce/?locale=es_LA', 606904479, 608664, 14, -34.7831, -58.6179, 1, 0, 'Admin0', 'Admin0', 'assets/tec14.jpg', 'ESCUELA TÉCNICA N°14', 'https://www.google.com/maps/dir//Bariloche+6615,+B1758+Gonz%C3%A1lez+Cat%C3%A1n,+Provincia+de+Buenos+Aires/@-34.7832937,-58.7004343,27216m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x95bcc5b3899394c5:0x5e91bad5b50da11d!2m2!1d-58.6180012!2d-34.7832751?entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D'),
(2, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA N°1 \"ARMADA ARGENTINA\"', '', '60866300', 'Educación Técnico Profesional', 'Nivel Secundario', 'JUAN MANUEL DE ROSAS - 5975', '11-4669-1440', 'mt069001@abc.gov.ar', 'https://www.facebook.com/tecnicauno.armadaargentina/?locale=es_LA', 606908178, 608663, 1, -34.6973, -58.5771, 2, 1, 'Admin1', 'Admin1', 'assets/tecnica1.jpg', 'ESCUELA TÉCNICA N°1', 'https://www.google.com/maps/place/Escuela+De+Educaci%C3%B3n+Secundaria+T%C3%A9cnica+N%C2%B01/@-34.6961296,-58.5795207,851m/data=!3m1!1e3!4m16!1m9!3m8!1s0x95bcc66b5971902f:0x8ec876e1060093b1!2sEscuela+De+Educaci%C3%B3n+Secundaria+T%C3%A9cnica+N%C2%B01!8m2!3d-34.6969764!4d-58.5777504!9m1!1b1!16s%2Fg%2F11cjj8p294!3m5!1s0x95bcc66b5971902f:0x8ec876e1060093b1!8m2!3d-34.6969764!4d-58.5777504!16s%2Fg%2F11cjj8p294?hl=es&entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D'),
(5530, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº2 ', '', '61192600', 'Educación Técnico Profesional', 'Nivel Secundario', 'AV. R. RODRIGUEZ - 3850', '11-4487-0175', 'tecnica2lamatanza@abc.gob.ar', 'https://www.facebook.com/latecnicados/?locale=es_LA', NULL, 611926, 2, -34.7306, -58.5338, 3, 2, 'Admin2', 'Admin2', 'assets/tecnica2lamat.jpg', 'ESCUELA TÉCNICA N°2', 'https://www.google.com/maps?client=firefox-b-d&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KTUZ7HVtz7yVMQiP4zUkT8sQ&daddr=Enfermera+Reinalda+Balancini+Viuda+de+Rodr%C3%ADguez+3400,+B1778+Cdad.+Evita,+Provincia+de+Buenos+Aires'),
(5531, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº3 ', '0069MT0003', '60560800', 'Educación Técnico Profesional', 'Nivel Secundario', 'SALTA - 2487', '11-4441-7328', 'tecnica3lamatanza@abc.gob.ar', 'https://tecnica-3-manuel-belgrano.webnode.page/', NULL, 605608, 3, -34.6765, -58.563, 4, 3, 'Admin3', 'Admin3', 'assets/tecnica3.jpg', 'ESCUELA TÉCNICA N°3', 'https://www.google.com/maps?client=firefox-b-d&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KQlfqPguxryVMbM80eWGDZnC&daddr=IQO+San+Justo+Buenos+Aires+AR,+Salta+2487,+B1754IQO+San+Justo,+Provincia+de+Buenos+Aires'),
(5532, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº4 ', '0069MT0004', '60765500', 'Educación Técnico Profesional', 'Nivel Secundario', 'VILLEGAS E/ ENTRE RIOS Y OCAMPO - 2231', '11-4651-5470', 'ealombardo@yahoo.com.ar', 'https://www.facebook.com/tecnica4desanjusto/?locale=es_LA', NULL, 607655, 4, -34.6758, -58.5601, 4, 4, 'Admin4', 'Admin4', 'assets/tec4.jpg', 'ESCUELA TÉCNICA N°4', 'https://www.google.com/maps/dir//B1754EQY,+Tom%C3%A1s+Justo+Villegas+2231,+B1754EQY+San+Justo,+Provincia+de+Buenos+Aires/@-34.6756459,-58.6424748,27251m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x95bcc6292ccddba1:0x509ff1d813b6951!2m2!1d-58.5600464!2d-34.6756978?entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D'),
(5533, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº5 ', '0069MT0005', '60818900', 'Educación Técnico Profesional', 'Nivel Secundario', 'PERIBEBUY E/ SARANDI Y JUJUY - 2751', '11-4484-4452', 'marpalacio2@abc.gob.ar', 'https://escuelatn5.wixsite.com/tec5', NULL, 608189, 5, -34.6896, -58.5498, 4, 5, 'Admin5', 'Admin5', 'assets/tec5.jpg', 'ESCUELA TÉCNICA N°5', 'https://www.google.com/maps?client=firefox-b-d&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KUk7hkShyLyVMW1sBJQ75Fcn&daddr=Peribebuy+2751,+B1766+San+Justo,+Provincia+de+Buenos+Aires'),
(5534, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA N°6', '', '60793500', 'Educación Técnico Profesional', 'Nivel Secundario', 'CENTENARIO Y RUTA NAC. N. 3 - S/N', '11-4625-4677', 'tecnica6lamatanza@abc.gob.ar', 'https://tecnica6.vercel.app/', NULL, 607935, 6, -34.695, -58.5754, 2, 6, 'Admin6', 'Admin6', 'assets/entrada.jpg', 'ESCUELA TÉCNICA N°6', 'https://www.google.com/maps?s=web&client=firefox-b-d&lqi=ChR0ZWNuaWNhIDYgbGEgbWF0YW56YUjOgf6I-KqAgAhaIBAAEAEYACIUdGVjbmljYSA2IGxhIG1hdGFuemEyAmVzkgEYZ2VuZXJhbF9lZHVjYXRpb25fc2Nob29smgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVVJYTW1SaFgzWjNSUkFCqgFMEAEqDSIJdGVjbmljYSA2KA4yHxABIhvAH-g3kXbcyC1HNA1AzQmTMvz_9cu-C130OIUyGBACIhR0ZWNuaWNhIDYgbGEgbWF0YW56YfoBBAgAED4&vet=12ahUKEwj2qta-0cePAxW4HbkGHZWaIW0Q1YkKegQIIRAB..i&cs=1&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KT-jkBsVxryVMaA51LKlzGxP&daddr=5899,B1765FWD,+Av.+Brig.+Gral.+Juan+Manuel+de+Rosas+5799,+B1765FWC+Isidro+Casanova,+Provincia+de+Buenos+Aires'),
(5535, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº7 ', '0069MT0007', '60868300', 'Educación Técnico Profesional', 'Nivel Secundario', 'SANTA ROSA - 5496', '11-4467-1447', 'eest7@hotmail.com', 'https://www.facebook.com/groups/131787963638417/?locale=es_LA', NULL, 608683, 7, -34.7338, -58.5841, 5, 7, 'Admin7', 'Admin7', 'assets/nestor.png', 'ESCUELA TÉCNICA N°7', 'https://www.google.com/maps?client=firefox-b-d&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KUmdiiLHxbyVMVYNIwynnDxj&daddr=Sta.+Rosa+5496,+B1757OQH+Gregorio+de+Laferrere,+Provincia+de+Buenos+Aires'),
(5536, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº8 JORGE NEWBERY', '0069MT0008', '61242100', 'Educación Técnico Profesional', 'Nivel Secundario', 'ALMAFUERTE E/DON BOSCO Y BUCHARDO - 17', '11-4659-1833', 'jnewbery8@yahoo.com.ar', 'https://www.facebook.com/p/EEST-N%C2%BA8-Jorge-Newbery-100078341416819/', NULL, 612421, 8, -34.6565, -58.5886, 6, 8, 'Admin8', 'Admin8', 'assets/newbery.jpg', 'LA NEWBERY', 'https://www.google.com/maps?client=firefox-b-d&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=Kb_ilh2Yx7yVMRbeamjsO_OO&daddr=AQB+Villa+Luzuriaga+Buenos+Aires+AR,+Almafuerte+17,+B1753'),
(5537, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº9 ', '', '60720300', 'Educación Técnico Profesional', 'Nivel Secundario', 'PASAJE TEMPERLEY - 945', '11-4622-9496', 'noemi.sotelo.t9@gmail.com', 'https://et9control.blogspot.com/', NULL, 607203, 9, -34.7075, -58.4809, 10, 9, 'Admin9', 'Admin9', 'assets/9.webp', 'ESCUELA TÉCNICA N°9', 'https://www.google.com/maps/dir//Temperley+945,+B1772+Villa+Madero,+Provincia+de+Buenos+Aires/@-34.7073474,-58.5636802,27241m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x95bcce942c9494c5:0x82368e6d5a852b03!2m2!1d-58.4812791!2d-34.7073751?entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D'),
(5538, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº10', '0069MT0010', '60551700', 'Educación Técnico Profesional', 'Nivel Secundario', 'MARIQUITA THOMPSON Y ESPAÑA - S/N', '11-4622-9757', 'estsecretaria10@gmail.com', 'https://www.instagram.com/tecnica10lamatanza/?hl=es', NULL, 605517, 10, -34.6903, -58.4921, 7, 10, 'Admin10', 'Admin10', 'assets/tec10.webp', 'ESCUELA TÉCNICA N°10', 'https://www.google.com/maps/place/Escuela+de+Educaci%C3%B3n+Secundaria+T%C3%A9cnica+N%C2%B0+10/@-34.6784811,-58.508058,6813m/data=!3m1!1e3!4m6!3m5!1s0x95bcceccbd1666db:0x84ebc84a49a80eba!8m2!3d-34.6904619!4d-58.4924389!16s%2Fg%2F11g9k23m4c?entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D'),
(5539, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº11 ', '', '61186100', 'Educación Técnico Profesional', 'Nivel Secundario', 'AV. MARTÍN MIGUEL DE GÜEMES - 3860', '11-4620-1108', 'tecnica11matanza@gmail.com', 'https://www.facebook.com/tecnicaoncematanza/?locale=es_LA', NULL, 611861, 11, -34.7265, -58.5297, 3, 11, 'Admin11', 'Admin11', 'assets/tec11.jpg', 'ESCUELA TÉCNICA N°11', 'https://www.google.com/maps?client=firefox-b-d&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KRszzxkTz7yVMUOcTyr2_K7v&daddr=Mart%C3%ADn+Miguel+de+G%C3%BCemes+3860,+B1778NBS+Cdad.+Evita,+Provincia+de+Buenos+Aires'),
(5540, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº12 ITALIA', '0069MT0012', '61032100', 'Educación Técnico Profesional', 'Nivel Secundario', 'ITUZAINGO - 4089', '11-4669-5686', 'tecnica12italia@gmail.com', 'http://tecnica12lamatanza.edu.ar/', NULL, 610321, 12, -34.6764, -58.5912, 6, 12, 'Admin12', 'Admin12', 'assets/tec12.JPG', 'ESCUELA TÉCNICA N°12', 'https://www.google.com/maps/dir//Ituzaing%C3%B3+4089,+B1753FHC+Villa+Luzuriaga,+Provincia+de+Buenos+Aires/@-34.6764439,-58.6717354,27251m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x95bcc7ad521a01f1:0xaa50ee267c5fea23!2m2!1d-58.5893342!2d-34.6764716?entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D'),
(8373, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº1 VÉLEZ SARSFIELD', '', '61115600', 'Educación Técnico Profesional', 'Nivel Secundario', 'SGO. DEL ESTERO E/RUY DIAZ Y SA.TERESA - 1650', '11-4697-9240', 'tecnica1moron@abc.gob.ar', 'https://tecnica1demoron.blogspot.com/', 610000333, 611156, 1, -34.6901, -58.6328, 14, 22, 'AdminM1', 'Moron1', 'assets/tecnia1moron.webp', 'VELEZ SARSFIELD', 'https://maps.app.goo.gl/sPJfDjAj3VgUvwKX9'),
(8376, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº 4 BRIGADA AÉREA', '', '60623600', 'Educación Técnico Profesional', 'Nivel Secundario', 'MATIENZO Y BERGAMINI - S/N', '11-4751-0662', 'escuelatecnica4@hotmail.com', 'https://cooperadoraescuelabaseelpalomar.com.ar/', 610001040, 606236, 4, -34.6082, -58.5997, 13, 23, 'AdminM4', 'Moron4', 'assets/tecnica4.webp', 'BRIGADA AÉREA', 'https://maps.app.goo.gl/fuPqvvMAgcytFHeZ7'),
(8378, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº6 CHACABUCO', '', '60612000', 'Educación Técnico Profesional', 'Nivel Secundario', 'AVENIDA RIVADAVIA - 17337', '11-4629-7744', 'tecnica6moron@abc.gob.ar', 'https://tecnica6moron.edu.ar/', 610001055, 606120, 6, -34.6479, -58.6087, 14, 24, 'AdminM6', 'Moron6', 'assets/chacabuco.webp', 'CHACABUCO', 'https://maps.app.goo.gl/PHNkJyCeWnVZQxh26'),
(8380, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº8 (MORÓN)', '', '60644200', 'Educación Técnico Profesional', 'Nivel Secundario', 'ANDRES FERREYRA - 1220', '11-4659-2009', 'eet8moron@hotmail.com', 'https://tecnica8moron.edu.ar/', 610001064, 606442, 8, -34.6361, -58.6084, 12, 25, 'Moron8', 'Tecnica8', 'assets/tecnica8moron.png', 'TECNICA 8 MORON', 'https://maps.app.goo.gl/nfdUCD5uuaM6u9nn7'),
(12622, 'INSTITUTO CENTRO SAN JOSE', '4069MT4469', '60378800', 'Educación Técnico Profesional', 'Nivel Secundario', 'ACHEGA - 5851', '2202-45-3465', 'instcsj@gmail.com', 'https://www.facebook.com/p/Instituto-Centro-San-Jos%C3%A9-100057678535324/?locale=es_LA', NULL, 603788, 4469, -34.7653, -58.6125, 1, 13, 'Admin13', 'Admin13', 'assets/sanjose.JPG', 'SAN JOSÉ', 'https://www.google.com/maps/dir//Domingo+Victorio+de+Achega+5851,+B1758+Gonz%C3%A1lez+Cat%C3%A1n,+Provincia+de+Buenos+Aires/@-34.7647303,-58.695367,27222m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x95bcc4f7eab54fc9:0x53c7aaacf48f0313!2m2!1d-58.6129659!2d-34.7647581?entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D'),
(12623, 'INSTITUTO JUAN XXIII', '4069MT4491', '60793300', 'Educación Técnico Profesional', 'Nivel Secundario', '9 DE JULIO Y AV. PTE. PERÓN - 151', '11-4658-6522', 'secretariatecnica@colparroquialjuan23.edu.ar', 'http://www.parroquialjuan23.edu.ar/', NULL, 607933, 4491, -34.6383, -58.5653, 8, 14, 'Admin14', 'Admin14', 'assets/Juan xxiii.jpg', 'JUAN XXIII', 'https://www.google.com/maps?client=firefox-b-d&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KUFMOK76x7yVMajcJTQuzCmA&daddr=EDC+Ramos+Mej%C3%ADa+Buenos+Aires+AR,+G%C3%BCemes+65,+B1704'),
(13957, 'ESCUELA TÉCNICO PROFESIONAL EMAÚS', '', '60050000', 'Educación Técnico Profesional', 'Nivel Secundario', 'LEONES - 967', '11-4659-5447', 'emaus@colegioemaus.edu.ar', 'https://www.colegioemaus.edu.ar/tecnica.html', 610002134, 600500, 4741, -34.624, -58.6036, 13, 26, 'AdminMemaus', 'Moron', 'assets/emaus.webp', 'Emaús', 'https://maps.app.goo.gl/xrdpj1HFhShDT7xc6'),
(17337, 'INSTITUTO MADERO', '4069MT5774', '61567800', 'Educación Técnico Profesional', 'Nivel Secundario', 'EVITA - 66', '11-4442-7372', 'info@madero.org', 'https://www.institutomadero.org.ar/', NULL, 615678, 5774, -34.6979, -58.5046, 7, 15, 'Admin15', 'Admin15', 'assets/instituto madero.jpg', 'INSTITUTO MADERO', 'https://www.google.com/maps?client=firefox-b-d&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KdUTtAPUzryVMcjrFft4XXrz&daddr=Evita+66,+B1770+Villa+Madero,+Provincia+de+Buenos+Aires'),
(18942, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº15', '', '61711400', 'Educación Técnico Profesional', 'Nivel Secundario', 'RUTA NACIONAL 3 KM.43 - S/N', '11-4469-9086', 'escuelafangio@yahoo.com.ar', 'https://www.facebook.com/escuelafundacionfangio/?locale=es_LA', NULL, 617114, 15, -34.8684, -58.6791, 9, 16, 'Admin16', 'Admin16', 'assets/tec15.jpg', 'ESCUELA TÉCNICA N°15', 'https://www.google.com/maps?s=web&client=firefox-b-d&lqi=ChV0ZWNuaWNhIDE1IGxhIG1hdGFuemFIhOClzPGqgIAIWiMQABABGAEYAyIVdGVjbmljYSAxNSBsYSBtYXRhbnphMgJlc5IBF2VkdWNhdGlvbmFsX2luc3RpdHV0aW9umgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVVIxZG5aaU4ycFJSUkFCqgFOEAEqDiIKdGVjbmljYSAxNSgOMh8QASIbmInA12rnuPTC7dC_QcRc2aZ-q8CuD_-Sz0URMhkQAiIVdGVjbmljYSAxNSBsYSBtYXRhbnph-gEECAAQGw&vet=12ahUKEwjo7efL08ePAxVuGbkGHSgdH9gQ1YkKegQIJhAB..i&cs=1&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KXtyfXNa3LyVMZQW1PyT-VIo&daddr=Ruta+nacional+N%C2%B0+3,+km+43,+entre+Carriego+y+Parravicini,+Barrio+Mercedes+Benz,+B1763+Virrey+del+Pino'),
(21472, 'COLEGIO MONSEÑOR TOMAS JUAN SOLARI', '', '61934300', 'Educación Técnico Profesional', 'Educación Técnico Profesional', 'DON BOSCO - 4817', '11 4697-2936', 'direccion.secundaria@colegiosolari.edu.ar', 'https://colegiosolari.edu.ar/', 610001518, 619343, 6763, -34.6812, -58.6174, 14, 27, 'AdminMsolari', 'Moron', 'assets/solari.png', 'Solari', 'https://maps.app.goo.gl/Wnh9sGNpDCmdR4gG8'),
(22762, 'ESCUELA DE EDUCACIÓN SECUNDARIA TÉCNICA Nº13', '0069MT0013', '62038200', 'Educación Técnico Profesional', 'Nivel Secundario', 'J.M. SOLOM - 2308', '11-3812-5044', 'latecnica13@gmail.com', NULL, NULL, 620382, 13, -34.7986, -58.6529, 9, 17, 'Admin17', 'Admin17', 'assets/tec13.jpg', 'ESCUELA TÉCNICA N°13', 'https://www.google.com/maps?client=firefox-b-d&um=1&ie=UTF-8&fb=1&gl=ar&sa=X&geocode=KRfjfTxcw7yVMYzM4MXG_jQf&daddr=Juan+M.+Cabot+5714,+B1763+Virrey+del+Pino,+Provincia+de+Buenos+Aires'),
(23338, 'INSTITUTO NACIONAL DE AVIACION CIVIL', '', '69001000', 'Educación Técnico Profesional', 'Nivel Secundario', 'AVDA. EVA PERÓN - 2200', '11-4629-8898', 'alumnos-ciata@faa.mil.ar', 'https://www.inac.edu.ar/', 610001249, 690010, 9000, -34.6731, -58.631, 11, 28, 'AdminMinac', 'Moron', 'assets/inac.jpg', 'INAC-CIATA', 'https://share.google/Yyyn25WjTZhcQoXkn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos_especialidades`
--

CREATE TABLE `establecimientos_especialidades` (
  `establecimiento_id` int NOT NULL,
  `especialidades_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `establecimientos_especialidades`
--

INSERT INTO `establecimientos_especialidades` (`establecimiento_id`, `especialidades_id`) VALUES
(2, 1),
(5533, 1),
(5535, 1),
(5536, 1),
(5539, 1),
(5540, 1),
(8378, 1),
(13957, 1),
(17337, 1),
(22762, 1),
(23338, 1),
(5537, 2),
(5533, 3),
(0, 4),
(5534, 5),
(5537, 5),
(8373, 5),
(8376, 5),
(8380, 5),
(12622, 5),
(12623, 5),
(0, 6),
(5534, 6),
(5538, 6),
(5539, 6),
(8378, 6),
(12623, 6),
(21472, 6),
(5530, 7),
(5531, 7),
(5538, 7),
(5540, 7),
(8373, 7),
(12623, 7),
(13957, 7),
(22762, 7),
(5536, 8),
(8376, 8),
(23338, 9),
(5530, 10),
(5532, 10),
(8378, 10),
(18942, 10),
(12623, 12),
(0, 14),
(8378, 14),
(5540, 15),
(5537, 16),
(2, 17),
(8380, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientoturno`
--

CREATE TABLE `establecimientoturno` (
  `establecimiento_id` int NOT NULL,
  `turno_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `establecimiento_id` int NOT NULL,
  `matricula_total` int DEFAULT NULL,
  `varones` int DEFAULT NULL,
  `mujeres` int DEFAULT NULL,
  `secciones` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `localidad_id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `municipio_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`localidad_id`, `nombre`, `municipio_id`) VALUES
(1, 'González Catán', 1),
(2, 'Isidro Casanova', 1),
(3, 'Ciudad Evita', 1),
(4, 'San Justo', 1),
(5, 'Gregorio de Laferrere', 1),
(6, 'Villa Luzuriaga', 1),
(7, 'Villa Madero', 1),
(8, 'Ramos Mejía', 1),
(9, 'Virrey del Pino', 1),
(10, 'Villa Celina', 1),
(11, 'Castelar', 2),
(12, 'Haedo', 2),
(13, 'El Palomar', 2),
(14, 'Morón', 2),
(15, 'Villa Sarmiento', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `municipio_id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`municipio_id`, `nombre`) VALUES
(1, 'La Matanza'),
(2, 'Morón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `turno_id` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`especialidad_id`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`establecimiento_id`),
  ADD KEY `localidad_id` (`localidad_id`);

--
-- Indices de la tabla `establecimientos_especialidades`
--
ALTER TABLE `establecimientos_especialidades`
  ADD PRIMARY KEY (`establecimiento_id`,`especialidades_id`),
  ADD KEY `especialidades_id` (`especialidades_id`);

--
-- Indices de la tabla `establecimientoturno`
--
ALTER TABLE `establecimientoturno`
  ADD PRIMARY KEY (`establecimiento_id`,`turno_id`),
  ADD KEY `turno_id` (`turno_id`);

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`establecimiento_id`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`localidad_id`),
  ADD KEY `municipio_id` (`municipio_id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`municipio_id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`turno_id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `localidad_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `turno_id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD CONSTRAINT `establecimiento_ibfk_1` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`localidad_id`);

--
-- Filtros para la tabla `establecimientos_especialidades`
--
ALTER TABLE `establecimientos_especialidades`
  ADD CONSTRAINT `establecimientos_especialidades_ibfk_1` FOREIGN KEY (`especialidades_id`) REFERENCES `especialidades` (`especialidad_id`),
  ADD CONSTRAINT `establecimientos_especialidades_ibfk_2` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimiento` (`establecimiento_id`);

--
-- Filtros para la tabla `establecimientoturno`
--
ALTER TABLE `establecimientoturno`
  ADD CONSTRAINT `establecimientoturno_ibfk_1` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimiento` (`establecimiento_id`),
  ADD CONSTRAINT `establecimientoturno_ibfk_2` FOREIGN KEY (`turno_id`) REFERENCES `turno` (`turno_id`);

--
-- Filtros para la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimiento` (`establecimiento_id`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`municipio_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
