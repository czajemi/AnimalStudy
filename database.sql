create table if not exists user_details
(
    id_user_details serial
        constraint user_details_pk
            primary key,
    name            varchar(100) not null,
    surname         varchar(100) not null,
    phone           varchar(20)
);

alter table user_details
    owner to pmqxucxzdhhjvm;

create unique index if not exists user_details_id_user_details_uindex
    on user_details (id_user_details);

create table if not exists role
(
    id_role serial
        constraint role_pk
            primary key,
    role    varchar(100) not null
);

alter table role
    owner to pmqxucxzdhhjvm;

create table if not exists users
(
    id              serial
        constraint users_pk
            primary key,
    email           varchar(255) not null,
    password        varchar(255) not null,
    fk_user_details integer      not null
        constraint users_user_details_id_user_details_fk
            references user_details
            on update cascade on delete cascade,
    fk_role         integer      not null
        constraint users_role_id_role_fk
            references role
            on update cascade on delete cascade
);

alter table users
    owner to pmqxucxzdhhjvm;

create unique index if not exists users_id_uindex
    on users (id);

create unique index if not exists role_id_role_uindex
    on role (id_role);

create table if not exists pet
(
    id_pet serial
        constraint pet_pk
            primary key
        constraint pet_users_id_fk
            references users
            on update cascade on delete cascade,
    name   varchar(200) not null,
    breed  varchar(200) not null,
    image  varchar(255) not null
);

alter table pet
    owner to pmqxucxzdhhjvm;

create unique index if not exists pet_id_pet_uindex
    on pet (id_pet);

create table if not exists vaccine
(
    id_vaccine       serial
        constraint vaccine_pk
            primary key,
    type             varchar(200) not null,
    application_date varchar(200) not null,
    expiration_date  varchar(200) not null,
    fk_pet           integer      not null
        constraint vaccine_pet_id_pet_fk
            references pet
            on update cascade on delete cascade
);

alter table vaccine
    owner to pmqxucxzdhhjvm;

create unique index if not exists vaccine_id_vaccine_uindex
    on vaccine (id_vaccine);

create table if not exists deworming
(
    id_deworming     serial
        constraint deworming_pk
            primary key,
    application_date varchar(200) not null,
    expiration_date  varchar(200),
    fk_pet           integer      not null
        constraint deworming_pet_id_pet_fk
            references pet
            on update cascade on delete cascade
);

alter table deworming
    owner to pmqxucxzdhhjvm;

create unique index if not exists deworming_id_deworming_uindex
    on deworming (id_deworming);

create table if not exists allergy
(
    id_allergy  serial
        constraint allergy_pk
            primary key,
    type        varchar(200),
    description varchar(200) not null
);

alter table allergy
    owner to pmqxucxzdhhjvm;

create unique index if not exists allergy_id_allergy_uindex
    on allergy (id_allergy);

create table if not exists allergy_to_pet
(
    fk_pet     integer not null
        constraint pet_allergy_to_pet__fk
            references pet
            on update cascade on delete cascade,
    fk_allergy integer not null
        constraint allergy_to_pet_allergy_id_allergy_fk
            references allergy
            on update cascade on delete cascade
);

alter table allergy_to_pet
    owner to pmqxucxzdhhjvm;

create unique index if not exists allergy_to_pet_allergy_id_uindex
    on allergy_to_pet (fk_allergy);

create or replace view view_pet(id_pet, name, breed, image) as
SELECT pet.id_pet,
       pet.name,
       pet.breed,
       pet.image
FROM pet;

alter table view_pet
    owner to pmqxucxzdhhjvm;

create or replace function function_addpet(zm_name character varying, zm_breed character varying, zm_image character varying) returns void
    language sql
as
$$
INSERT INTO pet (name, breed, image)
VALUES (zm_name, zm_breed, zm_image)
$$;

alter function function_addpet(varchar, varchar, varchar) owner to pmqxucxzdhhjvm;

INSERT INTO public.role (id_role, role) VALUES (1, 'owner');
INSERT INTO public.role (id_role, role) VALUES (2, 'petsitter');
INSERT INTO public.user_details (id_user_details, name, surname, phone) VALUES (1, 'Emilia', 'Czaja', '600700800');
INSERT INTO public.users (id, email, password, fk_user_details, fk_role) VALUES (1, 'emilia@pk.edu.pl', 'admin', 1, 1);
INSERT INTO public.view_pet (id_pet, name, breed, image) VALUES (1, 'Milan', 'Hungarian Vizsla', 'dog.jpg');
INSERT INTO public.vaccine (id_vaccine, type, application_date, expiration_date, fk_pet) VALUES (1, 'RABIES VACCINE', '26.04.2022', '26.05.2023', 1);
INSERT INTO public.deworming (id_deworming, application_date, expiration_date, fk_pet) VALUES (1, '20.09.2021', '20.12.2021', 1);
INSERT INTO public.allergy (id_allergy, type, description) VALUES (1, 'food', 'chicken');
INSERT INTO public.allergy_to_pet (fk_pet, fk_allergy) VALUES (1, 1);