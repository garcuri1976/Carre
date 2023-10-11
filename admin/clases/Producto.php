<?php
class Producto{
            public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$nombre = $c->test_input($datos[0]); 
            $descripcion = $c->test_input($datos[1]);
            $pc = $c->test_input($datos[2]);
            $pv = $c->test_input($datos[3]);
            $stock = $c->test_input($datos[4]);
            $imagen = $c->test_input($datos[5]);
            $categoria = $c->test_input($datos[6]);
			$sql = "INSERT INTO productos(nombre,descripcion,precio_normal,precio_rebajado,stock,imagen,id_categoria,estado) values('$nombre','$descripcion','$pc','$pv','$stock','$imagen','$categoria','activo')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$nombre = $c->test_input($datos[1]);
            $descripcion = $c->test_input($datos[2]);
            $pc = $c->test_input($datos[3]);
            $pv = $c->test_input($datos[4]);
            $stock = $c->test_input($datos[5]);
            $imagen = $c->test_input($datos[6]);
            $categoria = $c->test_input($datos[7]);
			$sql = "update productos set nombre = '$nombre', descripcion = '$descripcion', precio_normal = '$pc',precio_rebajado = '$pv',
            stock = '$stock', imagen = '$imagen', id_categoria = '$categoria' where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function delete($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update productos set estado = 'inactivo' where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    public function mostrar()
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT PRO.id_producto, PRO.nombre, PRO.descripcion, PRO.precio_normal, PRO.precio_rebajado, 
            PRO.stock, PRO.imagen, CA.categoria as id_categoria
            FROM productos AS PRO INNER JOIN categorias AS CA ON PRO.id_categoria = CA.id 
            WHERE PRO.estado = 'activo'; ";
			$result = mysqli_query($conexion,$sql);
            return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			/*$sql = "select * from productos where id_producto=$id";*/
            $sql = "SELECT * FROM productos WHERE id_producto = $id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_producto" =>html_entity_decode($ver[0]),
               "nombre" =>html_entity_decode($ver[1]),
               "descripcion" =>html_entity_decode($ver[2]),
               "precio_normal" =>html_entity_decode($ver[3]),
               "precio_rebajado" =>html_entity_decode($ver[4]),
               "stock" =>html_entity_decode($ver[5]),
               "imagen" =>html_entity_decode($ver[6]),
               "id_categoria" =>html_entity_decode($ver[7])
             );
            return $datos;
    }
    
    public function traer_datos_cb($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select precio_normal,stock from productos where estado = 'inactivo'";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
            "precio_normal" =>html_entity_decode($ver[0]),
            "stock" =>html_entity_decode($ver[1])
            );
            return $datos;
    }

                public function stock($id,$stock)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update productos set stock = stock + '$stock' where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    
}
