CREATE DEFINER=`ryans299`@`localhost` PROCEDURE `kill_to_inventory`(IN `id` VARCHAR(45))
Begin
	DECLARE carveGetter VARCHAR(45);
	SET carveGetter = get_carves(id);
	insert into Inventory (material, quantity, Carves_id, Carves_Monster_id) VALUES	(carveGetter, 1, Carves.name, id);
END