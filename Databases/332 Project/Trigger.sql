CREATE TRIGGER `Monster Kill` AFTER UPDATE ON `Monster`
 FOR EACH ROW Begin    
update Quests 
set Quests.finished = 1
where  new.id = Quests.monster_id
and new.alive = 0;
END