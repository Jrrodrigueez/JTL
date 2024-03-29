CREATE TABLE `estudiantes` ( 
 `ID_estudiantes` INT(11) NOT NULL AUTO_INCREMENT ,
 `PRnombreEST` VARCHAR(25) NOT NULL , 
 `SGnombreEST` VARCHAR(25) NOT NULL , 
 `PRapellidoEST` VARCHAR(25) NOT NULL , 
 `SGapellidoEST` VARCHAR(25) NOT NULL , 
 `identificacion_EST` INT(16) NOT NULL , 
 `tipo_identificacion` SET('C.C','C.E','T.I','R.C','NUIP','PASAPORTE') NOT NULL , 
 `fecha_nacimiento` DATE NOT NULL , 
 `lugar_nacimientoD` SET() NOT NULL , 
 `lugar_nacimientoM` SET() NOT NULL , 
 `lugar_expedicionD` SET() NOT NULL , 
 `lugar_expedicionM` SET() NOT NULL , 
 `fecha_expedicion` DATE NOT NULL , 
 `genero` SET('M','F','NOTDEFINE','OTHER') NOT NULL , 
 `tipo_sangre` SET('A+','A-','O+','O-','B+','B-','AB+','AB-') NOT NULL , 
 `lugar_residencia` SET('Acacías','Barranca de Upía','Cabuyaro','Castilla La Nueva','Cubarral','Cumaral','El Calvario','El Castillo','El Dorado','Fuente de Oro','Granada','Guamal','La Macarena','	La Uribe','Lejanías','Mapiripán','Mesetas','Puerto Concordia','Puerto Gaitán','Puerto Lleras','Puerto López','Puerto Rico','Restrepo','	San Carlos de Guaroa','San Juan de Arama','San Juanito','San Martín','Villavicencio','Vista Hermosa') NOT NULL,
 `zona` SET('','','')  NOT NULL,
 `estrato` SET('1','2','3','4','5','6','7','8') NOT NULL,
 `DIR_residencia` VARCHAR(30) NOT NULL , 
 `barrio_corregimiento` VARCHAR(30) NOT NULL , 
 `localidad_vereda` VARCHAR(30) NOT NULL ,
 `telefonoEST` INT(11) NOT NULL,
 `celularEST` INT(11) NOT NULL,
 `sede` SET('VILLAVICENCIO','LEJANIAS','MESETAS','PUERTO GAITAN') NOT NULL,
 `jornada` SET('DIURNA','NOCTURNA','FIN DE SEMANA') NOT NULL,
 `ID_curso` INT(11) NOT NULL AUTO_INCREMENT ,
 `grupo` SET('1','2','3','4','5') NOT NULL,
 `estado` SET('MATRICULADO','NO MATRICULADO', 'EN PROCESO') NOT NULL,
 `caracter` SET('APLICA','NO APLICA') NOT NULL,
 `especialidad` SET('','','') NOT NULL,
 `modalidad` SET('PRESENCIAL','VIRTUAL','A DISTANCIA') NOT NULL,
 `nuevo` SET('SI','NO') NOT NULL,
 `metodologia` SET('','','') NOT NULL,
 `repitente` SET('SI','NO') NOT NULL,
 `F.matricula` DATE NOT NULL,
 `F.retiro` DATE NOT NULL,
 `email` VARCHAR(25) NOT NULL,
 `sisben` SET('SI','NO') NOT NULL,
 `puntaje_sisben` DECIMAL(11) NULL,
 `dateadd` datetime NOT NULL,
	  PRIMARY KEY (`ID_estudiantes`))