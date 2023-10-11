<?php
class Usuario{
            public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$nombre = $c->test_input($datos[0]);  
            $apellido = $c->test_input($datos[1]);
            $clave = $c->test_input(md5($datos[2]));
            $tipo = $c->test_input($datos[3]);
            $estado = $c->test_input($datos[4]);
            $correo = $c->test_input($datos[5]);
			$sql = "INSERT INTO usuarios (nombre,apellido,clave,tipo,estado,correo) values('$nombre','$apellido','$clave','$tipo','$estado','$correo')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$nombre = $c->test_input($datos[1]);
            $apellido = $c->test_input($datos[2]);
            $clave= $c->test_input(md5($datos[3]));
            $tipo = $c->test_input($datos[4]);
            $estado = $c->test_input($datos[5]);
            $correo = $c->test_input($datos[6]);
			$sql = "update usuarios set nombre = '$nombre', apellido = '$apellido',clave = '$clave',
            tipo = '$tipo', estado = '$estado', correo = '$correo' where id_usuario=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function delete($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update usuarios set estado = '2' where id_usuario=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    public function mostrar()
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT id_usuario,nombre,apellido,clave,tipo,estado,correo FROM usuarios where estado =1";
			$result = mysqli_query($conexion,$sql);
            return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from usuarios where id_usuario=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_usuario" =>html_entity_decode($ver[0]),
               "nombre" =>html_entity_decode($ver[1]),
               "apellido" =>html_entity_decode($ver[2]),
               "clave" =>html_entity_decode($ver[3]),
               "tipo" =>html_entity_decode($ver[4]),
               "estado" =>html_entity_decode($ver[5]),
               "correo" =>html_entity_decode($ver[6])
             );
            return $datos;
    }
    
    
    
}
