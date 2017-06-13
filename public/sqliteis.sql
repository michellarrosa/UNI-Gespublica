SELECT ACl_idACL from contadeusuario WHERE session = '0b070208' 



SELECT u.ACL, s.id from contadeusuario as u join screens as s
on u.session = '1645f1ca01489c7d01fb6495d6a9b685fc1e5d20b84e0c50378423f67612c13f' AND u.ACL = s.ACL

SELECT nome
FROM componentes 
WHERE 
	ACL =(SELECT ACL from contadeusuario WHERE session = 'c4d9fa58e2c7cf409d44e62491ea85703fe8131f9f5b2d4a58c5ee96c108cfef');


SELECT c.nome as componente, s.nome as screen 
FROM componentes as c, screens as s 
WHERE c.ACL = (SELECT ACL from contadeusuario WHERE session = 'c4d9fa58e2c7cf409d44e62491ea85703fe8131f9f5b2d4a58c5ee96c108cfef') 
AND c.ACL = s.ACL 
AND c.id = s.componentes_id 
	

INSERT INTO `screens`(`Descricao`, `ACL`, `componentes_id`) VALUES ('screen 1', 2, 3)