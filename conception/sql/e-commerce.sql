drop database if exists eCommercedb;
create database if not exists eCommercedb character set utf8;
use eCommercedb;
# -----------------------------------------------------------------------------
#       table : user
# -----------------------------------------------------------------------------

create table `user`
   (
      iduser integer(2) not null auto_increment ,
      nom varchar(30) not null ,
      email varchar(45) not null ,
      `password` varchar(500) not null ,
      role varchar(5) not null,
      `date` timestamp default current_timestamp on update current_timestamp ,
      primary key (iduser)
   );

   insert into `user` (iduser, nom, email, `password`, `role`, `date`) 
   values (1, 'admin', 'admin@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin', current_timestamp);
   

# -----------------------------------------------------------------------------
#       table : produit
# -----------------------------------------------------------------------------

create table produit
   (
   idproduit integer(2) not null auto_increment  ,
   libelle varchar(255) not null ,
   montant integer(10) not null, 
   `description` text(100) not null
,
     primary key (idproduit)
   );
   
   insert into produit(libelle, montant, description) values
   ("Clothes", 1000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga corrupti est corporis atque, voluptates aspernatur? Quibusdam dolor, ab quidem numquam beatae soluta corrupti quas facere iure enim voluptatum commodi.'), 
   ("Frigo", 1000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga corrupti est corporis atque, voluptates aspernatur? Quibusdam dolor, ab quidem numquam beatae soluta corrupti quas facere iure enim voluptatum commodi.'), 
   ("Iphone", 2000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga corrupti est corporis atque, voluptates aspernatur? Quibusdam dolor, ab quidem numquam beatae soluta corrupti quas facere iure enim voluptatum commodi.'), 
   ("Laptop", 2000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga corrupti est corporis atque, voluptates aspernatur? Quibusdam dolor, ab quidem numquam beatae soluta corrupti quas facere iure enim voluptatum commodi.'), 
   ("Shoes", 5000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga corrupti est corporis atque, voluptates aspernatur? Quibusdam dolor, ab quidem numquam beatae soluta corrupti quas facere iure enim voluptatum commodi.'), 
   ("TV", 4000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga corrupti est corporis atque, voluptates aspernatur? Quibusdam dolor, ab quidem numquam beatae soluta corrupti quas facere iure enim voluptatum commodi.'), 
   ("Image", 100, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga corrupti est corporis atque, voluptates aspernatur? Quibusdam dolor, ab quidem numquam beatae soluta corrupti quas facere iure enim voluptatum commodi.'), 
   ("Masque", 100, "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga corrupti est corporis atque, voluptates aspernatur? Quibusdam dolor, ab quidem numquam beatae soluta corrupti quas facere iure enim voluptatum commodi."), 
   ("Toile", 200, "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga corrupti est corporis atque, voluptates aspernatur? Quibusdam dolor, ab quidem numquam beatae soluta corrupti quas facere iure enim voluptatum commodi.");
# -----------------------------------------------------------------------------
#       table : acheter
# -----------------------------------------------------------------------------

create table acheter
   (
   id integer(2) not null auto_increment,
   iduser integer(2) not null ,
   idproduit integer(2) not null ,
   `date` timestamp default current_timestamp on update current_timestamp
,
     primary key (id)
   );
   
# -----------------------------------------------------------------------------
#       creation des references de table
# -----------------------------------------------------------------------------

alter table acheter 
	add foreign key fk_acheter_user (iduser)
      references `user` (iduser);

alter table acheter 
	add foreign key fk_acheter_produit (idproduit)
      references produit (idproduit);


# -----------------------------------------------------------------------------
#                fin de generation
# -----------------------------------------------------------------------------
