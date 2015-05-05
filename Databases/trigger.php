<?php
CREATE
    DEFINER = { user | CURRENT_USER }]
    TRIGGER monster_dead
    After UPDATE
    ON Quests FOR EACH ROW
    BEGIN
		IF NOT monster.alive THEN
		Quests.finised = true ;
		END IF;
	End;//
?>