CREATE DEFINER=`ryans299`@`localhost` FUNCTION `get_carves`(`id` VARCHAR(45)) RETURNS varchar(45) CHARSET utf8
    NO SQL
Begin
declare carvefinder varchar(45);
set carvefinder = "check ";
select name into carvefinder from Carves where
monster_id = id;
return carvefinder;
end