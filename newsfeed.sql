SELECT * FROM newsfeed
WHERE usersId = "faraz@hot.com" OR privacy = "public" OR usersId IN (SELECT reciever
FROM friendlist WHERE sender = "faraz@hot.com" AND STATUS = "ok")
