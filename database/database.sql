
/* 1) SE CREA LA BASE DE DATOS*/
CREATE DATABASE tienda_master;
USE tienda_master;

/* 2)SE CREA LA TABLA DE USURAIOS*/
CREATE TABLE usuarios(
    id            int(100) auto_increment not null,
    nombre        varchar(100) not null,
    apellidos     varchar(100),
    email         varchar(100) not null,
    password      varchar(100) not null,
    rol           varchar(20),
    imagen        varchar(100),
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL, 'Admin', 'admin', 'admin@admin.com', 'contraseña', 'admin', null);

/* 3) SE CREA LA TABLA DE CATEGORIAS*/
CREATE TABLE categoria(
    id            int(250) auto_increment not null;
    nombre        varchar(100) not null,
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO categorias VALUES(null, 'Manga corta');
INSERT INTO categorias VALUES(null, 'Tirantes');
INSERT INTO categorias VALUES(null, 'Manga Larga');
INSERT INTO categorias VALUES(null, 'Sudaderas');

/* 4) SE CREA LA TABLA DE PRODUCTOS*/
CREATE TABLE productos(

id                int (250) auto_increment not null,
categoria_id      int (250) not null,
descripcion       text,
precio            float(100,2) not null,
stock             int(250) not null,
oferta            varchar(2)
fecha             date not null,
imagen            varchar(200),
CONSTRAINT pk_categorias PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

/* 5) SE CREA LA TABLA DE PEDIDOS*/
CREATE TABLE pedidos(

id                int (250) auto_increment not null,
usuario_id        int (250) not null,
provincia         varchar(100) not null,
localidad         varchar(100) not null,
direccion         varchar(200) not null,
coste             float(200,2) not null,
estado            varchar(200) not null,
fecha             date,
hora              time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

/* 6) SE CREA LA TABLA DE LINEA_PEDIDOS*/
CREATE TABLE lineas_pedidos(
id                  int(255) auto_increment not null,
pedido_id           int(255) not null,
producto_id         int(255) not null,
unidades            int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES  productos(id)
)ENGINE=InnoDb;


/*  DICCIONARIO DE FUNCIONES PARA LA CREACION DE LA BASE DE DATOS 
/*
CREATE = Se utiliza para iniciar la la creacion de la base de datos o la tabla  
TABLE = Se utiliza para indicar que se creara un tabla
id = indica que se creara un campo de datos id
int = indica que se registrara un dato numerico 
auto_increment = Indica que el valor es autoincrementable
 not null = Indica que el valor puede ser nulo, debe teer un valor
varchar(100) = Se utiliza para almacenar cadenas de caracteres, en este caso de hasta 100 bytes
CONSTRAINT = Se utiliza para crear o eliminar restricciones.
PRIMARY KEY() = Se utiliza para indicar que el campo es un identificador unico de la fila
UNIQUE() = Se itiliza para indicar que este campo es unico y no se puede repetir en la tabla
FOREIGN KEY() = Son las claves externas, se utiliza para mantener la conexion en diferntes tablas 
REFERENCES = Se utiliza para indicr que son  campos externos o hacen referencia a un campo de otras tablas 
ENGINE=InnoDb = es el motor de mysql para almacenar los datos desde la version 5.6 

NOTA: En esta parte se crea la base de datos y la logica de como va a funcionar la tienda 
      de camisetas con las diferentes tablas se definnen las llaves primarias y segundarias.
      CONSTRAINT pk_pedidos PRIMARY KEY(id)
      CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)]*/
