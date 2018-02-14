drop table if exists shelf cascade;
drop table if exists aisle cascade;
drop table if exists item cascade;

create table aisle(
    id int auto_increment,
    primary key (id)
);

create table shelf(
    number int,
    height int,
    aisle int,
    item int,
    foreign key (aisle) references aisle(id),
    primary key (number, height, aisle)
);

create table item(
    id int auto_increment,
    name text not null,
    customer text,
    quantity int,
    note text,
    primary key (id)
);

insert into item values(1, 'Empty', null, null, null);

insert into aisle values(1);
insert into aisle values(2);
insert into aisle values(3);
insert into aisle values(4);
insert into aisle values(5);
insert into aisle values(6);
insert into aisle values(7);
insert into aisle values(8);
